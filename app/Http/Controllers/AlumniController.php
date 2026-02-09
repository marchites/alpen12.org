<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumni;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'nama'        => 'required|string|max:100',
            'tahun_lulus' => 'required|digits:4',
            'jurusan'     => 'required|string|max:100',
            'pekerjaan'   => 'nullable|string|max:100',
            'no_hp'       => 'required|regex:/^[0-9+]+$/',
            'email'       => 'nullable|email|max:100',
            'domisili'    => 'required|string|max:150',
        ]);

        Alumni::create($request->only([
            'nama',
            'tahun_lulus',
            'jurusan',
            'pekerjaan',
            'no_hp',
            'email',
            'domisili'
        ]));

        return redirect()->route('alumni.create')->with('success', 'Data alumni berhasil disimpan');
    }

    public function whatsappBlast(Request $request)
    {
        if (!$request->numbers) {
            return back()->with('error', 'Pilih minimal satu alumni');
        }

        // Pecah string jadi array
        $numbers = explode(',', $request->numbers);

        // Normalisasi nomor
        $cleanNumbers = array_map(function ($number) {
            $number = preg_replace('/[^0-9]/', '', $number);

            // Jika diawali 08 → ubah ke 628
            if (str_starts_with($number, '08')) {
                return '628' . substr($number, 2);
            }

            // Jika sudah 628 → aman
            if (str_starts_with($number, '628')) {
                return $number;
            }

            return $number;
        }, $numbers);

        // WhatsApp hanya bisa buka 1 chat
        $phone = $cleanNumbers[0];

        $message = urlencode('Halo alumni, ini pesan dari sekolah');

        return redirect("https://wa.me/{$phone}?text={$message}");
    }



    public function destroy($id)
    {
        Alumni::findOrFail($id)->delete();

        return redirect()
            ->route('alumni.index')
            ->with('success', 'Data alumni berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:2048'
        ]);

        $file = fopen($request->file('file')->getRealPath(), 'r');

        DB::beginTransaction();

        try {
            $header = fgetcsv($file); // baris pertama (header)

            while (($row = fgetcsv($file)) !== false) {

                Alumni::create([
                    'nama'        => $row[0],
                    'tahun_lulus' => $row[1],
                    'jurusan'     => $row[2],
                    'pekerjaan'   => $row[3] ?? null,
                    'no_hp'       => $row[4],
                    'email'       => $row[5] ?? null,
                    'domisili'    => $row[6],
                ]);
            }

            DB::commit();

            return redirect()
                ->route('alumni.index')
                ->with('success', 'Data alumni berhasil diimport');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }

}
