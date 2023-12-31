@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Anggota</h6>
        </div>
        <div class="card-body">
        <form action="{{ url('update_murid', $murid->id) }}" method="post">
    {{-- <form action="{{route('update.murid')}}" method="post"> --}}
            {{csrf_field()}}
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
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" id="exampleFormControlInput1" value="{{ $murid->tanggal_lahir }}"placeholder="Masukkan Tanggal Lahir">
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
    
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
    </div>
</div>
</form>
</div>

@endsection
