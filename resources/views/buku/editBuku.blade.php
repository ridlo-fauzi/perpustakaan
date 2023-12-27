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
                        <a href="{{ route('buku.buku') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Ubah Buku</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="">
                                @csrf
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select id="kategori" name="kategori" class="form-control">
                                        <option disabled selected>Pilih Kategori</option>
                                        <option value="Majalah">Majalah</option>
                                        <option value="Komik">Komik</option>
                                        <option value="Ensiklopedia">Ensiklopedia</option>
                                        <option value="Kamus">Kamus</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <select id="penulis" name="penulis" class="form-control">
                                        <option disabled selected>Pilih Penulis</option>
                                        <option value="Linda">Linda</option>
                                        <option value="Taufiq Ismail">Taufiq Ismail</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <select id="penerbit" name="penerbit" class="form-control">
                                        <option disabled selected>Pilih Penerbit</option>
                                        <option value="Erlangga">Erlangga</option>
                                        <option value="Gramedia">Gramedia</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="rak">Rak</label>
                                    <select id="rak" name="rak" class="form-control">
                                        <option disabled selected>Pilih Rak</option>
                                        <option value="Buku Dongeng">Buku Dongeng</option>
                                        <option value="Buku Sejarah">Buku Sejarah</option>
                                    </select>
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
