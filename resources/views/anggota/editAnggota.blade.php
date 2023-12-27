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
                        <a href="{{ route('anggota.anggota') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Anggota</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('anggota.update', $anggota['id_anggota']) }}">
                                @method('put')
                                @csrf
                                @if ($errors->any())
                                  <div class="alert alert-danger">
                                    <div class="alert-title"><h4>Whoops!</h4></div>
                                      There are some problems with your input.
                                      <ul>
                                        @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                        @endforeach
                                      </ul>
                                  </div> 
                                @endif
                                <div class="form-group">
                                    <label for="id_anggota">ID Anggota</label>
                                    <input type="text" id="id_anggota" name="id_anggota" value="{{ old('id_anggota', $anggota->id_anggota) }}" class="form-control @error('id_anggota') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama', $anggota->nama) }}" class="form-control @error('nama') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $anggota->email) }}" class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="notelp">No Telp</label>
                                    <input type="text" id="notelp" name="notelp" value="{{ old('notelp', $anggota->notelp) }}" class="form-control @error('notelp') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        @foreach($gender as $gender)
                                        <option value="{{ $gender->value }}" {{ old('jenis_kelamin', $anggota->jenis_kelamin) === $gender->value ? 'selected' : '' }}>{{ $gender->value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $anggota->alamat) }}" class="form-control @error('alamat') is-invalid @enderror">
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