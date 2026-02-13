<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Position;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    //
    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'order' => 'required|integer'
        ]);

        Position::create($request->all());

        return redirect()->back()->with('success', 'Position berhasil dibuat');
    }
}
