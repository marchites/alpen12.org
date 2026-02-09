<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;

class AlumniController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Alumni::query();

        if ($request->tahun_lulus) {
            $query->where('tahun_lulus', $request->tahun_lulus);
        }

        if ($request->jurusan) {
            $query->where('jurusan', $request->jurusan);
        }

        if ($request->keyword) {
            $query->where('nama', 'like', '%' . $request->keyword . '%');
        }

        $alumni = $query->latest()->paginate(10)->withQueryString();
        return view('alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('alumni.create');
    }

    public function store(Request $request)
    {
        Alumni::create($request->all());
        return redirect()->route('alumni.create')->with('success', 'Data alumni berhasil disimpan');
    }

    public function whatsappBlast(Request $request)
    {
        $numbers = $request->no_hp;
        $message = urlencode('Halo alumni, ini pesan dari sekolah');


        $phones = implode(',', $numbers);
        return redirect("https://wa.me/?phone=$phones&text=$message");
    }

    public function destroy($id)
    {
        Alumni::findOrFail($id)->delete();

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Data alumni berhasil dihapus');
    }

}
