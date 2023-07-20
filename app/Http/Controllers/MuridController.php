<?php

namespace App\Http\Controllers;

use App\Models\Komisariat;
use App\Models\Murid;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'email'     => 'required',
            'tanggal_lahir'     => 'required',
            'nama'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'     => 'required'
        ]);

        $user = new User();
        $user->role = 'anggota';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->tanggal_lahir);
        $user->remember_token = str::random(50);
        $user->save();

        
        $murid = Murid::create([
            'id_anggota'     => $request->id_anggota,
            'email'          => $request->email,
            'id_wilayah'     => $request->id_wilayah,
            'id_komisariat'  => $request->id_komisariat,
            'nama'           => $request->nama,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'alamat'         => $request->alamat
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
            'user' => User::find($id),
            'wilayah' => Wilayah::all(),
            'komisariat' => Komisariat::all()
        ];

        //render view with post
        return view('admin.murid.edit_murid', $data);
    }
    public function update(Request $request,$id)
    {
        $murid = Murid::find($id);

        $this->validate($request, [
            'id_anggota'     => 'required',
            'id_wilayah'     => 'required',
            'id_komisariat'     => 'required',
            'tanggal_lahir'     => 'required',
            'nama'     => 'required',
            'jenis_kelamin'     => 'required',
            'alamat'     => 'required'
        ]);
        
        $murid->id_anggota = $request->input('id_anggota');
        $murid->id_wilayah = $request->input('id_wilayah');
        $murid->id_komisariat = $request->input('id_komisariat');
        $murid->tanggal_lahir = $request->input('tanggal_lahir');
        $murid->nama = $request->input('nama');
        $murid->jenis_kelamin = $request->input('jenis_kelamin');
        $murid->alamat = $request->input('alamat');

        $murid->update();

        $user = User::find($id);
        $user->password = bcrypt($request->input('tanggal_lahir'));

        return redirect('/murid');
    }

    public function hapus($id)
    {
        $murid = Murid::find($id);
        $murid->delete();
        
        $user = User::find($id);
        $user->delete();

        return redirect('/murid');
    }
    
    
}
