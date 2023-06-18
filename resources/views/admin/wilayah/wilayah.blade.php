@extends('admin.template.main')
@section('content')
    {{-- @dd($murid); --}}
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">
            <h6 class=" font-weight-bold text-primary">Data Wilayah</h6>
            <div class="float-right">
                <a href="/add_wilayah" class="btn btn-info btn-circle">
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
                            <th>Nama</th>
                            <th>Jumlah Komisariat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($wilayah as $no => $w)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $w->nama_wilayah }}</td>
                                <td>
                                    {{ $komisariat->where('id_wilayah', $w->id)->count() }}
                                </td>
                                <td>
                                    {{-- icon detail --}}
                                    <a href="{{ route('edit.wilayah', $w->id) }}">
                                        <i class="nav-icon fas fa-edit" style="color: green"></i>
                                    </a>
                                    |
                                    <a href="{{ route('hapus.wilayah', $w->id) }}">
                                        <i class="nav-icon fas fa-trash" style="color: red"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
