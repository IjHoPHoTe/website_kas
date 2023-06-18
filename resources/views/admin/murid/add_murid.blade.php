@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
        </div>
        <form action="{{ route('murid.store') }}" method="post">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
                    <input type="number" class="form-control" name="id_anggota" id="exampleFormControlInput1"
                        placeholder="Masukkan ID">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                    <input type="text" class="form-control" name="nama" id="exampleFormControlInput1"
                        placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-control" name="id_wilayah" id="wilayah">
                        <option value="">Pilih Wilayah</option>
                        @foreach ($wilayah as $w)
                            <option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="komisariat" class="form-label">Komisariat</label>
                    <select class="form-control" value="{{ old('id_komisariat') }}" name="id_komisariat" id="komisariat">
                        <option value="">Pilih Komisariat</option>
                        @foreach ($komisariat as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_komisariat }}</option>
                        @endforeach
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
