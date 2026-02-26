<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Location;
use Illuminate\Support\Facades\Auth;

class MutasiAsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasiAsets = MutasiAset::with('aset', 'lokasiAsal', 'lokasiTujuan', 'user')
            ->orderBy('tanggal_mutasi', 'desc')
            ->get();
        return view('mutasi.index', compact('mutasiAsets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::all();
        $locations = Location::all();
        return view('mutasi.create', compact('asets', 'locations'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'aset_id' => 'required|exists:asets,id',
            'lokasi_asal_id' => 'required|exists:locations,id',
            'lokasi_tujuan_id' => 'required|exists:locations,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        MutasiAset::create([
            'aset_id' => $request->aset_id,
            'lokasi_asal_id' => $request->lokasi_asal_id,
            'lokasi_tujuan_id' => $request->lokasi_tujuan_id,
            'tanggal_mutasi' => $request->tanggal_mutasi,
            'keterangan' => $request->keterangan,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('mutasi.index')
                         ->with('success', 'Mutasi aset berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MutasiAset $mutasiAset)
    {
        $mutasiAset->load('aset', 'lokasiAsal', 'lokasiTujuan', 'user');
        return view('mutasi.view', compact('mutasiAset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MutasiAset $mutasiAset)
    {
        $mutasiAset->load('aset', 'lokasiAsal', 'lokasiTujuan', 'user');
        $asets = Aset::all();
        $locations = Location::all();
        return view('mutasi.edit', compact('mutasiAset', 'asets', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MutasiAset $mutasiAset)
    {
        $request->validate([
            'aset_id' => 'required|exists:asets,id',
            'lokasi_asal_id' => 'required|exists:locations,id',
            'lokasi_tujuan_id' => 'required|exists:locations,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $mutasiAset->update([
            'aset_id' => $request->aset_id,
            'lokasi_asal_id' => $request->lokasi_asal_id,
            'lokasi_tujuan_id' => $request->lokasi_tujuan_id,
            'tanggal_mutasi' => $request->tanggal_mutasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('mutasi.index')
                         ->with('success', 'Mutasi aset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MutasiAset $mutasiAset)
    {
        $mutasiAset->delete();
        return redirect()->route('mutasi.index')
                         ->with('success', 'Mutasi aset berhasil dihapus.');

    }

    public function __construct()
{
    $this->middleware('auth');
}

}
