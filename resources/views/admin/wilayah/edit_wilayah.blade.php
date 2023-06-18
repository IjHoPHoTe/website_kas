@extends('admin.template.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Wilayah</h6>
    </div>
    <form action="{{ url('update_wilayah/' . $wilayah->id) }}" method="POST">
    <div class="card-body">
            {{csrf_field()}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Wilayah</label>
            <input type="text" class="form-control" value="{{ $wilayah->nama_wilayah }}" name="nama_wilayah" id="exampleFormControlInput1" placeholder="Masukkan Nama">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    </div>
</form>
</div>

@endsection