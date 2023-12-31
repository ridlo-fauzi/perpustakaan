<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        $dataLevel = ['admin', 'bagPeminjaman', 'bagPengelolaanBuku'];
        $dataJenisKelamin = ['Laki-laki', 'Perempuan'];
        return view('auth.register', compact('dataLevel', 'dataJenisKelamin'));
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();
        $register = User::create([
            'id_user' => uniqid(),
            'name' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'no_hp' => $validatedData['no_hp'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'alamat' => $validatedData['alamat'],
            'role' => $validatedData['role']
        ]);

        if ($register) {
            return redirect(route('login'))->with('success', 'Anda berhasil Registrasi silahkan login terlebih dahulu!');
        } else {
            return redirect(route('register'))->with('error', 'Anda Gagal Registrasi');
        }
    }

    public function login(LoginRequest $request)
    {
        $validatedData = $request->validated();

        // Cari pengguna berdasarkan alamat email yang diberikan
        $user = User::where('email', $validatedData['email'])->first();
        // Jika pengguna dengan email tersebut tidak ditemukan dalam database
        if (!$user) {
            return back()->withErrors(['email' => 'Email ini tidak terdaftar. Silakan coba lagi.']);
        }

        // Coba untuk melakukan otentikasi pengguna dengan email dan kata sandi yang diberikan
        // Fungsi Auth::attempt() akan mencocokkan kredensial dengan data yang ada di database
        if (Auth::attempt($validatedData)) {

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard')->with('success', 'Login berhasil! Selamat datang ' . Auth::user()->name);
            } else {
                return redirect()->intended('/login')->with('success', 'Login gagal !');
            }
        } else {
            // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
            return redirect('/')->with(['gagal' => 'Email atau password salah. Silakan coba lagi.']);
        }
    }

    public function logout()
    {
        // Proses logout menggunakan fungsi logout() dari Auth
        Auth::logout();

        // Redirect ke halaman login setelah logout
        return redirect('/')->with('success', 'Anda telah berhasil keluar. Sampai jumpa lagi!');
    }
}
