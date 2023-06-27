@extends('admin.template.main')
@section('content')
    {{-- @dd($murid); --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class=" font-weight-bold text-primary">Data Anggota</h6>
            <div class="float-right">
                <a href="/add_murid" class="btn btn-info btn-circle">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-hover">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Anggota</th>
                            <th>Nama</th>
                            <th>Wilayah</th>
                            <th>Komisariat</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($murid as $m)
                            <tr>
                                <td>{{ $m->id_anggota }}</td>
                                <td>{{ $m->nama }}</td>
                                <td>{{ $m->wilayah->nama_wilayah }}</td>
                                <td>{{ $m->komisariat->nama_komisariat }}</td>
                                <td>{{ $m->alamat }}</td>
                                <td>

                                    {{-- icon detail --}}
                                    <a href="{{ route('edit.murid', $m->id) }}">
                                        <i class="nav-icon fas fa-edit"></i>
                                    </a>
                                    |
                                    <a href="{{ url('delete', $m->id) }}">
                                        <i class="nav-icon fas fa-trash" style="color: red"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            {{-- <div class="card-footer">
                {{$murid->links() }} --}}
        </div>
    </div>
@endsection
