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
