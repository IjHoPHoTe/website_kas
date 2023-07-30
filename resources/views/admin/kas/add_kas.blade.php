@extends('admin.template.main')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kas</h6>
        </div>
        <form action="{{ route('kas.store') }}" method="POST">
            <div class="card-body">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="id_wilayah" class="form-label">Jenis Kas</label>
                    <select class="form-control" name="jenis">
                        <option value="">Pilih Jenis Kas</option>
                        <option value="masuk">Kas Masuk</option>
                        <option value="keluar">Kas Keluar</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kegiatan" class="form-label">Kegiatan</label>
                    <select class="form-control" name="kegiatan">
                        <option value="">Pilih Kegiatan</option>
                        <option value="nks">NKS</option>
                        <option value="ksb">KSB</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" id="exampleFormControlInput1"
                        placeholder="Masukkan Nominal">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                    <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
            </div>
        </form>
    </div>
@endsection
