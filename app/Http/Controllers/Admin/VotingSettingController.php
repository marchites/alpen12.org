<?php

namespace App\Http\Controllers\Admin;

use App\Models\VotingSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VotingSettingController extends Controller
{
    //
    public function create()
    {
        return view('admin.settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_at' => 'required|date',
            'end_at'   => 'required|date|after:start_at'
        ]);

        VotingSetting::updateOrCreate(
            ['id' => 1],
            [
                'start_at' => $request->start_at,
                'end_at' => $request->end_at,
                'is_active' => true
            ]
        );

        return back()->with('success','Setting voting disimpan');
    }
}
