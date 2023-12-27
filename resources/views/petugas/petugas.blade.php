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
                            <li class="active">Data table</li>
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
                        <strong class="card-title">Data Petugas</strong>
                        <a href="{{ route('petugas.tambah') }}" type="button" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Petugas</a>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Petugas</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No Hp</th>
                                    <th>Alamat</th>
                                    <th>Position</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($petugas as $petugas)
                                <tr>
                                    <td>{{ $petugas->id_user }}</td>
                                    <td>{{ $petugas->name }}</td>
                                    <td>{{ $petugas->email }}</td>
                                    <td>{{ $petugas->jenis_kelamin }}</td>
                                    <td>{{ $petugas->no_hp }}</td>
                                    <td>{{ $petugas->alamat }}</td>
                                    <td>{{ $petugas->role }}</td>
                                    <td>
                                        <a href="{{ route('petugas.edit',['id'=>$petugas['id_user']]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();if (confirm('Are you sure you want to delete this?')) {document.getElementById('delete-row-{{ $petugas['id_user'] }}').submit();}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form id="delete-row-{{ $petugas['id_user'] }}" action="{{ route('petugas.destroy',['id'=>$petugas['id_user']]) }}"method="POST">
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
