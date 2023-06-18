@extends('admin.template.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Komisariat</h6>
    </div>
    <form action="{{ url('update_komisariat/' . $komisariat->id) }}}" method="POST">
    <div class="card-body">
            {{csrf_field()}}
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nama Komisariat</label>
            <input type="text" class="form-control" value="{{ $komisariat->nama_komisariat }}" name="nama_komisariat" id="exampleFormControlInput1" placeholder="Masukkan Nama">
        </div>
        <div class="form-group">
            <label for="id_wilayah" class="form-label">Tahun Angkatan</label>
            <select class="form-control" name="id_wilayah">
                <option value="">Pilih Wilayah</option>
                @foreach ($wilayah as $w)
                    <option value="{{ $w->id }}"
                        {{ old('id_wilayah', $komisariat->id_wilayah) == $w->id ? 'selected' : null }}>
                        {{ $w->nama_wilayah }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
    </div>
</form>
</div>

@endsection