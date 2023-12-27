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
                        <a href="{{ route('petugas.petugas') }}" class="btn btn-primary btn-lg">Kembali</a> 
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Petugas</strong>
                        </div>
                        <div class="card-body">
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('petugas.store') }}">
                                @csrf 
                                <div class="form-group">
                                    <label for="id_user">ID user</label>
                                    <input type="text" id="id_user" name="id_user" value="{{ old('id_user') }}" class="form-control @error('id_user') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="password" id="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        <option selected disabled>Pilih Jenis Kelamin</option>
                                        @foreach($gender as $gender)
                                        <option value="{{ $gender->value }}" {{ old('jenis_kelamin') === $gender->value ? 'selected' : '' }}>{{ $gender->value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">no_hp</label>
                                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" class="form-control @error('no_hp') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" class="form-control @error('alamat') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                        <option selected disabled>Pilih Role</option>\
                                        @foreach($role as $role)
                                        <option value="{{ $role->value }}" {{ old('role') === $role->value ? 'selected' : '' }}>{{ $role->value }}</option>
                                        @endforeach
                                    </select>
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