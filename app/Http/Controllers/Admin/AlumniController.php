<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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
        return view('admin.alumni.index', compact('alumni'));
    }

    public function create()
    {
        return view('admin.alumni.create');
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

        return redirect()->route('admin.alumni.create')->with('success', 'Data alumni berhasil disimpan');
    }

    public function whatsappBlast(Request $request)
    {
        if (!$request->numbers) {
            return back()->with('error', 'Pilih minimal satu alumni');
        }

        $numbers = explode(',', $request->numbers);

        $cleanNumbers = array_map(function ($number) {
            $number = preg_replace('/[^0-9]/', '', $number);

            if (str_starts_with($number, '08')) {
                return '628' . substr($number, 2);
            }

            if (str_starts_with($number, '628')) {
                return $number;
            }

            return $number;
        }, $numbers);

        $phone = $cleanNumbers[0];
        $message = urlencode('Halo alumni, ini pesan dari sekolah');

        return redirect("https://wa.me/{$phone}?text={$message}");
    }

    public function destroy($id)
    {
        Alumni::findOrFail($id)->delete();

        return redirect()
            ->route('admin.alumni.index')
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
            $header = fgetcsv($file); 

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
                ->route('admin.alumni.index')
                ->with('success', 'Data alumni berhasil diimport');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->with('error', 'Gagal import: ' . $e->getMessage());
        }
    }

    public function createAlumni()
    {
        return view('alumni.create');
    }

    public function storeAlumni(Request $request)
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
}
