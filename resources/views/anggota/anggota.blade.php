@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Anggota</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- first row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Anggota</strong>
                        <a href="{{ route('anggota.tambah') }}" type="button" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Anggota</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Anggota</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>No Tlp</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($anggota as $anggota)
                                <tr>
                                    <td>{{ $anggota->id_anggota }}</td>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->email }}</td>
                                    <td>{{ $anggota->notelp }}</td>
                                    <td>{{ $anggota->jenis_kelamin }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>
                                        <a href="{{ route('anggota.edit', ['id'=>$anggota['id_anggota']]) }}" type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();if (confirm('Are you sure you want to delete this?')) {document.getElementById('delete-row-{{ $anggota['id_anggota'] }}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-row-{{ $anggota['id_anggota'] }}" action="{{ route('anggota.destroy',['id'=>$anggota['id_anggota']]) }}"method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7">
                                        No Record Found!
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
</div>
@endsection
