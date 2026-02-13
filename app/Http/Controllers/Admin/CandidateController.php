<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Position;
use App\Http\Controllers\Controller;

class CandidateController extends Controller
{
    //
    public function index()
    {
        $candidates = Candidate::with('position')->latest()->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        $positions = Position::orderBy('order')->get();
        return view('admin.candidates.create', compact('positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'position_id' => 'required',
            'photo' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('candidates', 'public');
        }

        Candidate::create([
            'nama' => $request->nama,
            'position_id' => $request->position_id,
            'vision' => $request->vision,
            'photo' => $photoPath
        ]);

        return back();
    }

}
