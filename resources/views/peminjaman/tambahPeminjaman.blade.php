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
                            <li><a href="{{ route('peminjaman.peminjaman') }}">Peminjaman</a></li>
                            <li class="active">Tambah Peminjaman</li>
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
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Peminjaman</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="id_petugas">ID Peminjaman</label>
                                    <input type="text" id="id_petugas" name="id_petugas" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pinjam">tanggal Pinjam</label>
                                    <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="tgl_kembali">tanggal Kembali</label>
                                    <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nameBuku">Name Buku</label>
                                    <input type="text" id="nameBuku" name="nameBuku" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="jmlBuku">Jumlah Buku</label>
                                    <input type="number" id="jmlBuku" name="jmlBuku" class="form-control">
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
