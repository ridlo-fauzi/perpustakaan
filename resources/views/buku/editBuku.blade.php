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
                            <strong class="card-title">Ubah Buku</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('buku.update', $buku->isbn) }}">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" id="isbn" name="isbn" value="{{ old('isbn', $buku->isbn) }}" class="form-control">
                                    @error('isbn')
                                        <small id="isbn" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" class="form-control">
                                    @error('judul')
                                        <small id="judul" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select id="id_category" name="id_category" class="form-control">
                                        <option disabled selected>Pilih Kategori</option>
                                        @foreach ($dataKategori as $kategori)
                                            <option value="{{ $kategori->id_category }}" {{ old('id_category', $buku->id_category) == $kategori->id_category ? 'selected' : '' }}>
                                                {{ $kategori->nama_category }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_category')
                                        <small id="id_category" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" name="nama_penulis" id="nama_penulis" value="{{ old('nama_penulis', $buku->penulis->nama_penulis) }}" class="form-control">
                                    @error('nama_penulis')
                                        <small id="nama_penulis" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <select id="id_penerbit" name="id_penerbit" class="form-control">
                                        <option disabled selected>Pilih Penerbit</option>
                                        @foreach ($dataPenerbit as $penerbit)
                                            <option value="{{ $penerbit->id_penerbit }}" {{ old('id_penerbit', $buku->id_penerbit) == $penerbit->id_penerbit ? 'selected' : '' }}>
                                                {{ $penerbit->nama_penerbit }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_penerbit')
                                        <small id="id_penerbit" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="rak">Rak</label>
                                    <select id="id_rak" name="id_rak" class="form-control">
                                        <option disabled selected>Pilih Rak</option>
                                        @foreach ($dataRak as $rak)
                                            <option value="{{ $rak->id_rak }}" {{ old('id_rak', $buku->id_rak) == $rak->id_rak ? 'selected' : '' }}>{{ $rak->nama_rak }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_rak')
                                        <small id="id_rak" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jumlah_halaman">Jumlah Halaman</label>
                                    <input type="text" id="jumlah_halaman" name="jumlah_halaman" value="{{ old('jumlah_halaman', $buku->jumlah_halaman) }}" class="form-control">
                                    @error('jumlah_halaman')
                                        <small id="jumlah_halaman" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
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
