@extends('admin.template.main')
@section('content')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Kas</h6>
    </div>
    <form action="{{route('wilayah.store')}}" method="post">
    <div class="card-body">
            {{csrf_field()}}

    <div class="row">
        <div class="col-md-4 mb-4">
            <label for="id_wilayah" class="form-label">Kategori</label>
                    <select class="form-control" name="jenis">
                        <option value="semua">Semua</option>
                        <option value="masuk">Kas Masuk</option>
                        <option value="keluar">Kas Keluar</option>
                    </select>
        </div>

        <div class="col-md-4 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Tanggal Awal</label>
            <input type="date" class="form-control" name="nama_wilayah" id="exampleFormControlInput1" placeholder="Masukkan Nama">
        </div>

        <div class="col-md-4 mb-4">
            <label for="exampleFormControlInput1" class="form-label">Tanggal Akhir</label>
            <input type="date" class="form-control" name="nama_wilayah" id="exampleFormControlInput1" placeholder="Masukkan Nama">
        </div>
    </div>

    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-md btn-primary">CETAK</button>
    </div>
</form>
</div>

@endsection

{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laporan Kas</title>
</head>
<body>
    <h1>Laporan Kas Masuk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kasMasuk as $index => $kas)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kas->tanggal }}</td>
                    <td>{{ $kas->keterangan }}</td>
                    <td>{{ $kas->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Laporan Kas Keluar</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kasKeluar as $index => $kas)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kas->tanggal }}</td>
                    <td>{{ $kas->keterangan }}</td>
                    <td>{{ $kas->jumlah }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> --}}
