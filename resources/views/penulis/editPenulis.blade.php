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
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="my-5">
                        <a href="{{ route('penulis.penulis') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Penulis</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="id_penulis">ID Penulis</label>
                                    <input type="text" id="id_penulis" name="id_penulis" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="Name">Name</label>
                                    <input type="text" id="Name" name="Name" class="form-control">
                                </div>
                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection