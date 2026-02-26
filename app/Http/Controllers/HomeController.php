<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $baik = Aset::where('kondisi', 'baik')->count();
        $rusak = Aset::where('kondisi', 'rusak')->count();
        $maintenance = Aset::where('kondisi', 'maintenance')->count();

        $totalAset = Aset::count();
        $totalBaik = Aset::where('kondisi', 'baik')->count();
        $persenBaik = $totalAset > 0 ? ($totalBaik / $totalAset) * 100 : 0;

        $asets = Aset::with('category', 'location')->get();

        return view('home', compact('baik', 'asets', 'rusak', 'maintenance', 'persenBaik', 'totalBaik', 'totalAset'));
    }
}
