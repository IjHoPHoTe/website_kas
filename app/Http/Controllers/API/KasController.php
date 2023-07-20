<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function kasMasuk()
    {
        // $kasMasuk = Kas::where('user_id', Auth::id())->get();
        $kasMasuk = Kas::where('jenis', 'masuk')->get();

        return response()->json([
            'success' => true,
            'data' => $kasMasuk,
            'message' => 'Sukses menampilkan data'
        ]);
    
        // return view('admin.kas.kas_masuk', compact('kasMasuk'));
    }
    public function kasKeluar()
    {
    $kasKeluar = Kas::where('jenis', 'keluar')->get();

    return response()->json([
        'success' => true,
        'data' => $kasKeluar,
        'message' => 'Sukses menampilkan data'
    ]);

    // return view('admin.kas.kas_keluar', compact('kasKeluar'));
    }

    public function semuaKas()
    {
    $semuakas = Kas::all();

    return response()->json([
        'success' => true,
        'data' => $semuakas,
        'message' => 'Sukses menampilkan data'
    ]);

    // return view('admin.kas.semua_kas', compact('semuakas'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis' => 'required|in:masuk,keluar',
            'jumlah' => 'required|numeric|min:0',
            'keterangan' => 'required|string',
        ]);

        // Simpan data ke dalam database
        $kas = new Kas();
        $kas->jenis = $request->jenis;
        $kas->jumlah = $request->jumlah;
        $kas->keterangan = $request->keterangan;
        $kas->save();

        // Jika berhasil, kirimkan respons dengan status 201 (Created)
        return response()->json(['message' => 'Data kas berhasil disimpan'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kas = Kas::find($id);

        if (!$kas) {
            return response()->json(['message' => 'Data kas tidak ditemukan.'], 404);
        }

        return response()->json(['data' => $kas], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
