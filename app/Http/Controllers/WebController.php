<?php

namespace App\Http\Controllers;

use App\Models\Kas;
// use App\Models\Komisariat;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index() {
        $totalKasMasuk = Kas::where('jenis','masuk')->sum('jumlah');
        $totalKasKeluar = Kas::where('jenis','keluar')->sum('jumlah');
        $sisaKas = $totalKasMasuk - $totalKasKeluar;

        // $jumlahKomisariat = Komisariat::where('total', 'komisariat')->sum('jumlah');

        return view('admin.dashboard',compact('totalKasMasuk','totalKasKeluar','sisaKas'));
    }
}
