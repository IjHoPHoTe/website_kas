@extends('admin.template.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Anggota</h6>
    </div>
    {{-- <form action="{{route('update.murid')}}" method="post"> --}}
    <div class="card-body">
            {{csrf_field()}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
            <input type="number" class="form-control" name="id_anggota" value="{{ $murid->id_anggota }}" id="exampleFormControlInput1" placeholder="Masukkan ID">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="{{ $murid->nama }}"placeholder="Masukkan Nama">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Wilayah</label>
            {{-- <input type="text" class="form-control" name="wilayah" id="exampleFormControlInput1" value="{{ $murid->wilayah }}"> --}}
            <select class="form-control" name="wilayah" value="{{ $murid->wilayah }}" id="exampleFormControlInput">
            {{-- <option selected>Pilih Wilayah</option> --}}
            <option value="Pasuruan"{{ $murid->wilayah =="Pasuruan" ? 'selected' : '' }}>Pasuruan</option>
            <option value="Malang"{{ $murid->wilayah =="Malang" ? 'selected' : '' }}>Malang</option>
            <option value="Lumajang"{{ $murid->wilayah =="Lumajang" ? 'selected' : '' }}>Lumajang</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Komisariat</label>
            <select class="form-control" name="komisariat" value="{{ $murid->komisariat }}" id="exampleFormControlInput">
            {{-- <option selected>Pilih Komisariat</option> --}}
            <option value="Kraton"{{ $murid->komisariat =="Kraton" ? 'selected' : '' }}>Kraton</option>
            <option value="Kejayan"{{ $murid->komisariat =="Kejayan" ? 'selected' : '' }}>Kejayan</option>
            <option value="Pandaan"{{ $murid->komisariat =="Pandaan" ? 'selected' : '' }}>Pandaan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Alamat</label>
            <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $murid->alamat }}</textarea>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
    </div>
</form>
</div>

@endsection