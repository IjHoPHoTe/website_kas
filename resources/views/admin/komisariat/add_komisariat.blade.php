@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Komisariat</h6>
        </div>
        <form action="{{ route('komisariat.store') }}" method="POST">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Komisariat</label>
                    <input type="text" class="form-control" name="nama_komisariat" id="exampleFormControlInput1"
                        placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Wilayah</label>
                    <select class="form-control" name="id_wilayah">
                        <option value="">Pilih Wilayah</option>
                        @foreach ($wilayah as $w)
                            <option value="{{ $w->id }}">{{ $w->nama_wilayah }}
                            </option>
                        @endforeach
                    </select>
                    @error('thn_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
