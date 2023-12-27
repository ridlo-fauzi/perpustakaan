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
    
        <!-- first row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Penulis</strong>
                        <a href="{{ route('penulis.create') }}" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Penulis</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Penulis</th>
                                    <th>ISBN</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapenulis as $penulis)
                                <tr>
                                    <td>{{ $penulis->id_penulis }}</td>
                                    <td>{{ $penulis->isbn }}</td>
                                    <td>{{ $penulis->nama_penulis }}</td>
                                    <td>
                                        <a href="{{ route('penulis.edit', 1) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                @endforeach
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
