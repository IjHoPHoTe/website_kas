@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
        </div>
        <form action="{{ url('update_murid', $murid->id) }}" method="post">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID Anggota</label>
                    <input type="number" class="form-control" value="{{ $murid->id_anggota }}" name="id_anggota"
                        id="exampleFormControlInput1" placeholder="Masukkan ID">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Anggota</label>
                    <input type="text" class="form-control" value="{{ $murid->nama }}" name="nama"
                        id="exampleFormControlInput1" placeholder="Masukkan Nama">
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                        <option value="{{ $murid->jenis_kelamin }}">
                            {{ $murid->jenis_kelamin == 'Laki-laki' ? 'Laki-Laki' : 'Perempuan' }}</option>
                        @if ($murid->jenis_kelamin == 'Laki-laki')
                            <option value="Perempuan">Perempuan</option>
                        @else
                            <option value="Laki-laki">Laki-Laki</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="wilayah" class="form-label">Wilayah</label>
                    <select class="form-control" name="id_wilayah" id="wilayah">
                        <option value="">Pilih Wilayah</option>
                        @foreach ($wilayah as $w)
                            <option value="{{ $w->id }}"
                                {{ old('id_wilayah', $murid->id_wilayah) == $w->id ? 'selected' : null }}>
                                {{ $w->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="komisariat" class="form-label">Komisariat</label>
                    <select class="form-control" value="{{ old('id_komisariat') }}" name="id_komisariat" id="komisariat">
                        <option value="">Pilih Komisariat</option>
                        @foreach ($komisariat as $k)
                            <option value="{{ $k->id }}"
                                {{ old('id_Komisariat', $murid->id_komisariat) == $k->id ? 'selected' : null }}>
                                {{ $k->nama_komisariat }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                    <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" rows="3">{{ $murid->alamat }}</textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            </div>
        </form>
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
