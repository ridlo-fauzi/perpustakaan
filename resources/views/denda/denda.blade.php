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
                            <li class="active">Denda</li>
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
                        <strong class="card-title">Data Denda</strong>
                        <button type="button" class="btn btn-outline-primary float-right"><i class="fa fa-plus"></i>&nbsp; Denda</button>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID Denda</th>
                                    <th>ID Detail Peminjaman</th>
                                    <th>Name</th>
                                    <th>Nominal Denda</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>100234</td>
                                    <td>9910918</td>
                                    <td>Terlambat Pengembalian</td>
                                    <td>Rp. 10.000</td>
                                    <td>Rp. 10.000</td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
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
