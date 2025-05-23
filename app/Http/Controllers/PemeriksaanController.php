<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\PosUjiOption;
use Illuminate\Http\Request;
use App\Models\JenisBuktiOption;
use App\Models\DokumenSumberOption;
use Illuminate\Support\Facades\Auth;
use App\Models\MetodePemeriksaanOption;
use App\Models\TeknikPemeriksaanOption;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pemeriksaan::with(['posUji', 'jenisBukti', 'dokumenSumber', 'metode', 'teknik'])->get();
        $posUjiOptions = PosUjiOption::all();
        $jenisBuktiOptions = JenisBuktiOption::all();
        $dokumenSumberOptions = dokumenSumberOption::all();
        $metodeOptions = MetodePemeriksaanOption::all();
        $teknikOptions = TeknikPemeriksaanOption::all();
        return view('perekaman.index', compact('data', 'posUjiOptions', 'jenisBuktiOptions', 'dokumenSumberOptions', 'metodeOptions', 'teknikOptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perekaman.create', [
            'posUjiOptions' => PosUjiOption::all(),
            'jenisBuktiOptions' => JenisBuktiOption::all(),
            'dokumenSumberOptions' => DokumenSumberOption::all(),
            'metodeOptions' => MetodePemeriksaanOption::all(),
            'teknikOptions' => TeknikPemeriksaanOption::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_wajib_pajak' => 'required',
            'npwp' => 'required',
            'tahun_pajak' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nomor_sp2' => 'nullable',
            'pos_uji_id' => 'required',
            'temuan_pemeriksaan' => 'nullable',
            'jenis_bukti_id' => 'required',
            'dokumen_sumber_id' => 'required',
            'metode_id' => 'required',
            'teknik_id' => 'required',
            'evaluasi_bukti' => 'nullable',
            'kesimpulan' => 'nullable',
            'tindak_lanjut' => 'nullable',
            'catatan_tambahan' => 'nullable',
            'supervisor' => 'nullable'
        ]);

        // Tambahkan field perekam
        $validated['perekam'] = Auth::user()->username;

        // Simpan data validasi + perekam
        Pemeriksaan::create($validated);

        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemeriksaan $pemeriksaan)
    {
        return view('pemeriksaan.show', compact('pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemeriksaan $pemeriksaan)
    {
        return view('perekaman.edit', [
            'pemeriksaan' => $pemeriksaan,
            'posUjiOptions' => PosUjiOption::all(),
            'jenisBuktiOptions' => JenisBuktiOption::all(),
            'dokumenSumberOptions' => DokumenSumberOption::all(),
            'metodeOptions' => MetodePemeriksaanOption::all(),
            'teknikOptions' => TeknikPemeriksaanOption::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemeriksaan $pemeriksaan)
    {
        $request->validate([
            'nama_wajib_pajak'     => 'required',
            'npwp'                 => 'required',
            'tahun_pajak'          => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'nomor_sp2'            => 'nullable',
            'pos_uji_id'           => 'required',
            'temuan_pemeriksaan'   => 'nullable',
            'jenis_bukti_id'       => 'required',
            'dokumen_sumber_id'    => 'required',
            'metode_id'            => 'required',
            'teknik_id'            => 'required',
            'evaluasi_bukti'       => 'nullable',
            'kesimpulan'           => 'nullable',
            'tindak_lanjut'        => 'nullable',
            'catatan_tambahan'     => 'nullable',
            'supervisor'           => 'nullable',
        ]);

        $validated['perekam'] = Auth::user()->username;

        $pemeriksaan->update($validated);

        return redirect()->route('dashboard')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemeriksaan $pemeriksaan)
    {
        $pemeriksaan->delete();
        return redirect()->route('dashboard')->with('success', 'Data berhasil dihapus.');
    }
}
