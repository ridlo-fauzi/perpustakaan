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
                        <a href="{{ route('kategori.index') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Kategori</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('kategori.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="id_category">ID Kategori</label>
                                    <input type="text" id="id_category" name="id_category" class="form-control">
                                    @error('id_category')
                                        <small id="id_category" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_category">Nama Kategori</label>
                                    <input type="text" id="nama_category" name="nama_category" class="form-control">
                                    @error('nama_category')
                                        <small id="nama_category" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi" class="form-control">
                                    @error('deskripsi')
                                        <small id="deskripsi" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Tambahkan field lainnya sesuai kebutuhan -->
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection