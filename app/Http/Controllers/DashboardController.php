<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pemeriksaan;
use App\Models\PosUjiOption;
use Illuminate\Http\Request;
use App\Models\JenisBuktiOption;
use App\Models\DokumenSumberOption;
use App\Models\MetodePemeriksaanOption;
use App\Models\TeknikPemeriksaanOption;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemeriksaan::with(['posUji', 'jenisBukti', 'dokumenSumber', 'metode', 'teknik']);

        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('nama_wajib_pajak', 'like', "%$search%")
                ->orWhere('npwp', 'like', "%$search%")
                ->orWhere('nomor_sp2', 'like', "%$search%")
                ->orWhere('tahun_pajak', 'like', "%$search%")
                ->orWhere('temuan_pemeriksaan', 'like', "%$search%")
                ->orWhere('supervisor', 'like', "%$search%");
            });
        }

        $data = $query->orderBy('updated_at', 'desc')->get();

        $posUjiOptions = PosUjiOption::all();
        $jenisBuktiOptions = JenisBuktiOption::all();
        $dokumenSumberOptions = DokumenSumberOption::all();
        $metodeOptions = MetodePemeriksaanOption::all();
        $teknikOptions = TeknikPemeriksaanOption::all();

        return view('dashboard', compact('data', 'posUjiOptions', 'jenisBuktiOptions', 'dokumenSumberOptions', 'metodeOptions', 'teknikOptions'));
    }

    public function exportPdf($id)
    {
        $header = Pemeriksaan::with(['posUji', 'jenisBukti', 'dokumenSumber', 'metode', 'teknik'])->findOrFail($id);
        $data = collect([$header]); // agar tetap bisa di-looping seperti array

        $pdf = Pdf::loadView('pdf.export-pdf', compact('data', 'header'))->setPaper('a4', 'landscape');
        $nomorSp2 = preg_replace('/[\/\s]+/', '-', $header->nomor_sp2); // ganti '/' dan spasi dengan '-'
        return $pdf->download("$nomorSp2.pdf");

    }

    public function handleBulkAction(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids');

        if (!$ids || !is_array($ids)) {
            return back()->with('error', 'Tidak ada data yang dipilih.');
        }

        if ($action === 'delete') {
            Pemeriksaan::whereIn('id', $ids)->delete();
            return back()->with('success', 'Data berhasil dihapus.');
        }

        if ($action === 'export') {
            $data = Pemeriksaan::with(['posUji', 'jenisBukti', 'dokumenSumber', 'metode', 'teknik'])
                ->whereIn('id', $ids)
                ->get();

            $first = $data->first();
            $filtered = $data->filter(fn($item) => 
                $item->nama_wajib_pajak === $first->nama_wajib_pajak &&
                $item->npwp === $first->npwp &&
                $item->tahun_pajak === $first->tahun_pajak &&
                $item->nomor_sp2 === $first->nomor_sp2 &&
                $item->supervisor === $first->supervisor
            );

            $first = $filtered->first(); // Ambil baris pertama untuk header info
            $nomorSP2 = str_replace(['/', ' '], '-', $first->nomor_sp2); // Hindari karakter tidak valid di filename

            $pdf = Pdf::loadView('pdf.export-pdf', ['data' => $filtered, 'header' => $first])
                ->setPaper('a4', 'landscape');

            return $pdf->download("$nomorSP2.pdf");

        }

        return back()->with('error', 'Aksi tidak dikenali.');
    }

}
