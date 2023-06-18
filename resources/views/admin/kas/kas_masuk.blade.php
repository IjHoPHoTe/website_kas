@extends('admin.template.main')
@section('content')
    {{-- @dd($murid); --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class=" font-weight-bold text-primary">Data Kas Masuk</h6>
            <div class="float-right">
                <a href="/add_kas" class="btn btn-info btn-circle">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-hover">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kasMasuk as $kas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kas->keterangan }}</td>
                                <td>{{ $kas->jumlah }}</td>
                                <td>{{ $kas->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection