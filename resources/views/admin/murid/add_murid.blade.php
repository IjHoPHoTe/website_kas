@extends('admin.template.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
    </div>
    <form action="{{route('murid.store')}}" method="post">
    <div class="card-body">
            {{csrf_field()}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
            <input type="number" class="form-control" name="id_anggota" id="exampleFormControlInput1" placeholder="Masukkan ID">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="Masukkan Nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Wilayah</label>
            <select class="form-control" name="wilayah" id="exampleFormControlInput">
            <option selected>Pilih Wilayah</option>
            <option value="Pasuruan">Pasuruan</option>
            <option value="Malang">Malang</option>
            <option value="Lumajang">Lumajang</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Komisariat</label>
            <select class="form-control" name="komisariat" id="exampleFormControlInput">
            <option selected>Pilih Komisariat</option>
            <option value="Kraton">Kraton</option>
            <option value="Kejayan">Kejayan</option>
            <option value="Pandaan">Pandaan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    </div>
</form>
</div>

@endsection