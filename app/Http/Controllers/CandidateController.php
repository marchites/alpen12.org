<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class CandidateController extends Controller
{
    //
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
