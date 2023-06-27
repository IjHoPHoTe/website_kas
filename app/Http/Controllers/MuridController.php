<?php

namespace App\Http\Controllers;

use App\Models\Komisariat;
use App\Models\Murid;
use App\Models\Wilayah;
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
        $murid = Murid::All();
        return view('admin.murid.murid')->with('murid', $murid);
    }

    public function create()
    {
        $data = [
            'murid' => Murid::all(),
            'wilayah' => Wilayah::all(),
            'komisariat' => Komisariat::all()
        ];
        return view('admin.murid.add_murid', $data);
    }

    public function store(Request $request)
    {
        // validate form
        $this->validate($request, [
            'id_anggota'     => 'required',
            'id_wilayah'     => 'required',
            'id_komisariat'     => 'required',
            'nama'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'     => 'required'
        ]);
        $murid = Murid::all();
        Murid::create([
            'id_anggota'     => $request->id_anggota,
            'id_wilayah'     => $request->id_wilayah,
            'id_komisariat'     => $request->id_komisariat,
            'nama'     => $request->nama,
            'jenis_kelamin'     => $request->jenis_kelamin,
            'alamat'     => $request->alamat
        ]);
// dd($request);
        // redirect to index
        return redirect('/murid')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function edit(string $id)
    {
        //get post by ID
        $data = [
            'murid' => Murid::find($id),
            'wilayah' => Wilayah::all(),
            'komisariat' => Komisariat::all()
        ];

        //render view with post
        return view('admin.murid.edit_murid', $data);
    }
    public function update()
    {
        $murid = Murid::all();
        return view('admin.murid.murid')->with('murid', $murid);
    }
    
}
