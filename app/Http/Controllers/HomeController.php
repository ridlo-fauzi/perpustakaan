<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $petugas = DB::table('users')->count();
        $anggota = DB::table('anggota')->count();
        return response(view('home', ['petugas' => $petugas, 'anggota' => $anggota]));
    }

    public function bagPem()
    {
        return view('homebagPem.home');
    }

    public function bagPB()
    {
        return view('homebagPB.home');
    }
}
