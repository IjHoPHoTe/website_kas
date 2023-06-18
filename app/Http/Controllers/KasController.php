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

    public function kasMasuk() {
        $kasMasuk = Kas::where('jenis', 'masuk')->get();
    
        
        return view('admin.kas.kas_masuk', compact('kasMasuk'));
    }
    public function kasKeluar()
{
    $kasKeluar = Kas::where('jenis', 'keluar')->get();

    return view('admin.kas.kas_keluar', compact('kasKeluar'));
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
            'keterangan'     => 'required',
            'jumlah'     => 'required',
        ]);
        $kas = Kas::create([
            'jenis'=> $request->jenis,
            'jumlah'=> $request->jumlah,
            'keterangan'=> $request->keterangan,
        ]);
        
        if ($kas->jenis === 'masuk') {
            return redirect()->route('kas.masuk');
        } else {
            return redirect()->route('kas.keluar');
        }
    }

    /**
     * Display the specified resource.
     */
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
    public function destroy(Kas $kas)
    {
        //
    }
}