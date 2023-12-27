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
                            <strong class="card-title">Ubah Data Petugas</strong>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                              <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                              <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <!-- Tambahkan formulir di sini -->
                            <form method="post" action="{{ route('petugas.update', $petugas['id_user']) }}">
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
                                    <label for="id_user">ID user</label>
                                    <input type="text" id="id_user" name="id_user" value="{{ old('id_user', $petugas->id_user) }}" class="form-control @error('id_user') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="{{ old('name', $petugas->name) }}" class="form-control @error('name') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" value="{{ old('email', $petugas->email) }}" class="form-control @error('email') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input type="text" id="password" value="{{ old('password'), $petugas->password }}" name="password" class="form-control" placeholder="kosongkan jika tidak ingin mengubah password">
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                        @foreach($gender as $gender)
                                        <option value="{{ $gender->value }}" {{ old('jenis_kelamin', $petugas->jenis_kelamin) === $gender->value ? 'selected' : '' }}>{{ $gender->value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">no_hp</label>
                                    <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $petugas->no_hp) }}" class="form-control @error('no_hp') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $petugas->alamat) }}" class="form-control @error('alamat') is-invalid @enderror">
                                </div>

                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <select id="role" name="role" class="form-control @error('role') is-invalid @enderror">
                                        @foreach($role as $role)
                                        <option value="{{ $role->value }}" {{ old('role', $petugas->role) ===  $role->value ? 'selected' : '' }}>{{ $role->value }}</option>
                                        @endforeach
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