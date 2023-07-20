@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
        </div>
        <form action="{{route('murid.store')}}" method="post">
            {{csrf_field()}}
            <div class="card-body">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
                    <input type="number" class="form-control" name="id_anggota" value="{{old('id_anggota')}}" id="exampleFormControlInput1" placeholder="Masukkan ID">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" value="{{old('nama')}}" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" id="exampleFormControlInput1" placeholder="Masukkan Tanggal Lahir">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option>Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleFormControlInput1" placeholder="Masukkan email">
                </div>
                <div class="form-group">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-control" name="id_wilayah" id="id_wilayah">
                        <option value="">Pilih Wilayah</option>
                        @foreach ($wilayah as $w)
                            <option value="{{ $w->id }}">{{ $w->nama_wilayah }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="komisariat" class="form-label">Komisariat</label>
                    <select class="form-control" value="{{ old('id_komisariat') }}" name="id_komisariat" id="id_komisariat">
                        <option value="">Pilih Komisariat</option>
                        @foreach ($komisariat as $k)
                            <option value="{{ $k->id }}">{{ $k->nama_komisariat }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" value="{{old('alamat')}}" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            </div>
        </form>
        </div>
        
    </div>
    

@endsection
