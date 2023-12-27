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
                        <a href="{{ route('buku.index') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Buku</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('buku.store') }}">
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
                                    <label for="sinopsis">Sinopsis</label>
                                    <textarea name="sinopsis" id="sinopsis" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit</label>
                                    <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="id_category">Kategori</label>
                                    <select id="id_category" name="id_category" class="form-control">
                                        <option disabled selected>Pilih Kategori</option>
                                        @foreach ($dataKategori as $kategori)
                                            <option value="{{ $kategori->id_category }}">{{ $kategori->nama_category }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nama_penulis">Nama Penulis</label>
                                    <input type="text" name="nama_penulis" id="nama_penulis" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="id_penerbit">Penerbit</label>
                                    <select id="id_penerbit" name="id_penerbit" class="form-control">
                                        <option disabled selected>Pilih Penerbit</option>
                                        @foreach ($dataPenerbit as $penerbit)
                                            <option value="{{ $penerbit->id_penerbit }}">{{ $penerbit->nama_penerbit }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_rak">Rak</label>
                                    <select id="id_rak" name="id_rak" class="form-control">
                                        <option disabled selected>Pilih Rak</option>
                                        @foreach ($dataRak as $rak)
                                            <option value="{{ $rak->id_rak }}">{{ $rak->nama_rak }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_halaman">Jumlah Halaman</label>
                                    <input type="text" id="jumlah_halaman" name="jumlah_halaman" class="form-control">
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