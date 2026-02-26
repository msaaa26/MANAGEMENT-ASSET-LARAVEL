<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Location;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asets = Aset::with('category', 'location')->get();
        return view('asset.index', compact('asets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('asset.create', compact('categories', 'locations'));
    }
    public function __construct()
{
    $this->middleware('auth');
}


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_aset' => 'required|string|max:255|unique:asets',
            'nama_aset' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'kondisi' => 'required|in:baik,maintenance,rusak',
            'jumlah' => 'required|integer|min:1',
        ]);

        Aset::create($request->all());

        return redirect()->route('asset.index')
                         ->with('success', 'Asset berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        return view('asset.view', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        $categories = Category::all();
        $locations = Location::all();
        return view('asset.edit', compact('aset', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $request->validate([
            'kode_aset' => 'required|string|max:255|unique:asets,kode_aset,' . $aset->id,
            'nama_aset' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'location_id' => 'required|exists:locations,id',
            'kondisi' => 'required|in:baik,maintenance,rusak',
            'jumlah' => 'required|integer|min:1',
        ]);

        $aset->update($request->all());

        return redirect()->route('asset.index')
                         ->with('success', 'Asset berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();
        return redirect()->route('asset.index')
                         ->with('success', 'Asset berhasil dihapus.');
    }
}
