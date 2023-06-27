<?php

namespace App\Http\Controllers;

use App\Models\Komisariat;
use App\Models\Murid;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KomisariatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'count' => DB::table('murids')->count(),
            'komisariat' =>  Komisariat::all(),
            'wilayah' =>  Wilayah::all(),
            'murid' => Murid::all()
        ];
        return view('admin.komisariat.komisariat', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'wilayah' => Wilayah::all(),
            'komisariat' => Komisariat::all(),
            'page' => 'Tambah Wilayah'
        ];
        return view('admin.komisariat.add_komisariat', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wilayah = new Wilayah();
        $komisariat = Komisariat::all();
        $this->validate($request, [
            'nama_komisariat'     => 'required',
            'id_wilayah'     => 'required',
        ]);
        Komisariat::create([
            'nama_komisariat' => $request->nama_komisariat,
            'id_wilayah' => $request->id_wilayah,
        ]);
        // dd($request);
        return redirect('/komisariat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Komisariat $komisariat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komisariat $komisariat, $id)
    {
        $data = [
            'wilayah' => Wilayah::all(),
            'komisariat' => Komisariat::find($id)
        ];
        return view('admin.komisariat.edit_komisariat',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $komisariat = Komisariat::find($id);
        $wilayah = Wilayah::find($id);
        $this->validate($request, [
            'nama_komisariat'     => 'required',
            'id_wilayah'     => 'required',
        ]);
        $komisariat->nama_komisariat = $request->input('nama_komisariat');
        $komisariat->id_wilayah = $request->input('id_wilayah');
        
        $komisariat->update();

        // dd($request);
        return redirect('/komisariat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapus(Komisariat $komisariat,$id)
    {
        $komisariat = Komisariat::find($id);
        // $total = $komisariat->total;
        $komisariat->delete();

        // if($total ==='komisariat'){
        return redirect('/komisariat');
    }
}
