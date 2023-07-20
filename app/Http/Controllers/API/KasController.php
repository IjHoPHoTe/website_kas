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
        $validator = validator::make($request->all(), [
            'jenis'     => 'required|in:masuk,keluar',
            'keterangan'     => 'required',
            'jumlah'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $kas = Kas::create([
            'jenis'=> $request->jenis,
            'jumlah'=> $request->jumlah,
            'keterangan'=> $request->keterangan,
        ]);
        
        if ($kas->jenis === 'masuk') {
            return response()->json(['message' => 'Data kas masuk berhasil disimpan.'], 201);
        } else {
            return response()->json(['message' => 'Data kas masuk berhasil disimpan.'], 201);
        }
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
