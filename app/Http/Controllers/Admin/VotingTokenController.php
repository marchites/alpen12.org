<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\VotingToken;
use Illuminate\Support\Str;

class VotingTokenController extends Controller
{
    //
    public function index()
    {
        $tokens = VotingToken::with('alumni')->latest()->get();
        return view('admin.tokens.index', compact('tokens'));
    }

    public function create()
    {
        $alumni = Alumni::doesntHave('votingToken')->get();
        return view('admin.tokens.create', compact('alumni'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'alumni_id' => 'required|exists:alumnis,id|unique:voting_tokens,alumni_id'
        ]);

        $alumni = Alumni::findOrFail($request->alumni_id);

        VotingToken::create([
            'alumni_id' => $alumni->id,
            'token'     => $alumni->id // token diambil dari alumni_id
        ]);

        return redirect()->route('admin.tokens.index')
            ->with('success', 'Token berhasil dibuat untuk ' . $alumni->name);
    }

    public function generate()
    {
        Alumni::doesntHave('votingToken')->each(function ($alumni) {
            VotingToken::create([
                'alumni_id'=>$alumni->id,
                'token'=>Str::random(32)
            ]);
        });

        return back()->with('success','Token berhasil dibuat');
    }
}
