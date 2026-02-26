<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use Illuminate\Http\Request;
use App\Models\MutasiAset;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanAset(Request $request)
    {
        $query = Aset::with(['category', 'location']);

        // Gunakan when() agar lebih rapi, hanya filter jika ada inputnya (tidak kosong)
        $query->when($request->filled('kategori_id'), function ($q) use ($request) {
            return $q->where('category_id', $request->kategori_id);
        });

        $query->when($request->filled('periode'), function ($q) use ($request) {
            // Kita gunakan whereDate supaya bisa input YYYY-MM-DD saja
            return $q->whereDate('created_at', $request->periode);
        });

        $aset = $query->get();

        // AMBIL DATA INI supaya dropdown tidak kosong!
        $categories = \App\Models\Category::all();

        // Kirim $categories ke view
        return view('laporan.aset', compact('aset', 'categories'));
    }
    public function laporanMutasi(Request $request)
    {
        $query = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user']);
        if ($request->has('periode')) {
            $query->whereDate('tanggal_mutasi', $request->periode);
        }
        $mutasi = $query->get();
        return view('laporan.mutasi', compact('mutasi'));
    }

    public function show(Aset $aset)
    {
        $category = Category::all();
        return view('laporan.aset', compact('aset', 'categories'));
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cetakPdf(Request $request)
    {
        $query = Aset::with(['category', 'location']);
        $query->when($request->filled('kategori_id'), function ($q) use ($request) {
            return $q->where('category_id', $request->kategori_id);
        });
        $query->when($request->filled('periode'), function ($q) use ($request) {
            return $q->whereDate('created_at', $request->periode);
        });
        $aset = $query->get();
        $pdf = Pdf::loadView('laporan.pdf_aset', compact('aset'));
        if ($aset->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data untuk dicetak dengan filter ini.');
        }
        return $pdf->download('Laporan-Asset-' . date('Y-m-d') . '.pdf');
    }












    public function cetakMutasiPdf(Request $request)
    {
        // Ambil data mutasi dengan relasinya agar tidak N+1 query
        $query = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user']);

        // Jika ingin ditambah filter tanggal/periode mutasi nanti
        

        $mutasi = $query->get();

        
        // Load view khusus untuk PDF mutasi
        $pdf = Pdf::loadView('laporan.pdf_mutasi', compact('mutasi'))
            ->setPaper('a4', 'landscape'); // Pakai landscape biar muat banyak kolom
            // Cek jika kosong, gunakan SweetAlert (session error) yang sudah kita buat tadi
        if ($mutasi->isEmpty()) {
            return redirect()->back()->with('error', 'Data mutasi tidak ditemukan untuk dicetak.');
        }
        return $pdf->download('Laporan-Mutasi-' . date('Y-m-d') . '.pdf');
    }
}
