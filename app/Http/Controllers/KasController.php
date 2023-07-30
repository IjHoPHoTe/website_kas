<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;


class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function kasMasuk()
    {
        $kasMasuk = Kas::where('jenis', 'masuk')->get();
    
        
        return view('admin.kas.kas_masuk', compact('kasMasuk'));
    }
    public function kasKeluar()
{
    $kasKeluar = Kas::where('jenis', 'keluar')->get();

    return view('admin.kas.kas_keluar', compact('kasKeluar'));
}
public function semuaKas()
{
    $semuakas = Kas::all();

    return view('admin.kas.semua_kas', compact('semuakas'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kas.add_kas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis'     => 'required|in:masuk,keluar',
            'kegiatan'     => 'required|in:nks,ksb,lainnya',
            'keterangan'     => 'required',
            'jumlah'     => 'required',
        ]);
        $kas = Kas::create([
            'jenis'=> $request->jenis,
            'kegiatan'=> $request->kegiatan,
            'jumlah'=> $request->jumlah,
            'keterangan'=> $request->keterangan,
        ]);
        // dd($request->all());
        if ($kas->jenis === 'masuk') {
            return redirect()->route('kas.masuk');
        } else {
            return redirect()->route('kas.keluar');
        }
    }

    /**
     * Display the specified resource.
     */
    public function laporan(Kas $kas)
    {
        //
    }

    public function show(Kas $kas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kas $kas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kas $kas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus($id)
    {
        $kas = Kas::find($id);
        $jenis = $kas->jenis;
        $kas->delete();

        if($jenis ==='masuk'){
            return redirect()->route('kas.masuk');
        } else{
            return redirect()->route('kas.keluar');
        }
    }
}