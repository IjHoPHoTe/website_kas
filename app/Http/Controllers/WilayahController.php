<?php

namespace App\Http\Controllers;

use App\Models\Komisariat;
use App\Models\Murid;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'komisariat' => new Komisariat(),
            'count' => DB::table('murids')->count(),
            'wilayah' =>  Wilayah::all(),
        ];
        return view('admin.wilayah.wilayah', $data);
    }
    public function create()
    {
        $data = [
            'wilayah' => Wilayah::all(),
            'page' => 'Tambah Wilayah'
        ];
        return view('admin.wilayah.add_wilayah', $data);
    }
    public function store(Request $request)
    {
        $wilayah = Wilayah::all();
        $this->validate($request, [
            'nama_wilayah'     => 'required',
        ]);
        Wilayah::create([
            'nama_wilayah'=> $request->nama_wilayah,
        ]);
        return redirect('/wilayah');
    }
    public function edit($id)
    {
        $data = [
            'wilayah' => Wilayah::find($id)
        ];
        return view('admin.wilayah.edit_wilayah',$data);
    }
    public function update(Request $request, $id)
    {
        $wilayah = Wilayah::find($id);
        $this->validate($request, [
            'nama_wilayah'     => 'required',
        ]);
        $wilayah->nama_wilayah = $request->input('nama_wilayah');
        $wilayah->update();

        return redirect('/wilayah');
    }
    public function hapus($id)
    {
        $wilayah = Wilayah::find($id);
        $wilayah->delete();

        return redirect('/wilayah');
    }
}