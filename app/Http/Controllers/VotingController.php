<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VotingToken;
use App\Models\VotingSetting;
use App\Models\Position;
use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Support\Facades\DB;

class VotingController extends Controller
{
    public function index($token)
    {
        $tokenData = VotingToken::where('token', $token)->firstOrFail();
        $setting   = VotingSetting::first();
        $candidates = Candidate::all();

        // Jika setting belum ada
        if (!$setting || !$setting->is_active) {
            return view('voting.closed', [
                'title'   => 'Voting Belum Tersedia',
                'message' => 'Sistem voting belum diaktifkan oleh panitia.'
            ]);
        }

        // Voting belum dibuka
        if (now()->lt($setting->start_at)) {
            return view('voting.closed', [
                'title'   => 'Voting Belum Dibuka',
                'message' => 'Voting akan dibuka sesuai jadwal yang telah ditentukan.'
            ]);
        }

        // Voting sudah ditutup
        if (now()->gt($setting->end_at)) {
            return view('voting.closed', [
                'title'   => 'Voting Telah Ditutup',
                'message' => 'Proses voting telah berakhir. Terima kasih atas partisipasi Anda.'
            ]);
        }

        // Token sudah digunakan
        if ($tokenData->isUsed()) {
            return view('voting.closed', [
                'title'   => 'Token Sudah Digunakan',
                'message' => 'Token voting ini sudah digunakan dan tidak dapat digunakan kembali.'
            ]);
        }

        // Voting aktif
        $positions = Position::with('candidates')
            ->orderBy('order')
            ->get();

        return view('voting.index', compact('positions', 'token', 'candidates'));
    }

    public function store(Request $request, $token)
    {
        $tokenData = VotingToken::where('token', $token)
            ->lockForUpdate()
            ->firstOrFail();

        if ($tokenData->isUsed()) {
            abort(403, 'Token sudah digunakan');
        }

        DB::transaction(function () use ($request, $tokenData) {
            foreach ($request->votes as $positionId => $candidateId) {
                Vote::create([
                    'voting_token_id' => $tokenData->id,
                    'position_id'     => $positionId,
                    'candidate_id'    => $candidateId,
                ]);
            }

            $tokenData->update([
                'used_at' => now()
            ]);
        });

        return redirect('/results');
    }

    public function results()
    {
        $candidates = Candidate::with(['votes', 'position'])
            ->withCount('votes')
            ->get();

        return view('voting.results', compact('candidates'));
    }
}