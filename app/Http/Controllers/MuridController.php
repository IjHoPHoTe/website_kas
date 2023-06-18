<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        // $data = [
        //     $murid = Murid::all()
        // ];
        $murid = Murid::all();
        return view('admin.murid.murid')->with('murid', $murid);
    }

    public function create()
    {
        $murid = Murid::all();
        return view('admin.murid.add_murid')->with('murid', $murid);
    }

    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'id_anggota'     => 'required',
            'nama'     => 'required',
            'wilayah'     => 'required',
            'komisariat'     => 'required',
            'alamat'     => 'required'
        ]);
        $murid = Murid::all();
        Murid::create([
            'id_anggota'=> $request->id_anggota,
            'nama'=> $request->nama,
            'wilayah'=> $request->wilayah,
            'komisariat'=> $request->komisariat,
            'alamat'=> $request->alamat,
        ]);
// dd($request);
        // redirect to index
        return redirect('/murid')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id)
    {
        //get post by ID
        $murid = Murid::findOrFail($id);

        //render view with post
        return view('admin.murid.edit_murid', compact('murid'));
    }
    public function update()
    {
        $murid = Murid::all();
        return view('admin.murid.murid')->with('murid', $murid);
    }
    
}
