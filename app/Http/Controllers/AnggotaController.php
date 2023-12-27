<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Enums\GenderEnum;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;

class AnggotaController extends Controller
{
    public function index(): Response
    {
        $anggota = Anggota::All();
        return response(view('anggota.anggota', ['anggota' => $anggota]));
    }

    public function create(): Response
    {
        $gender = GenderEnum::cases();
        return response(view('anggota.tambahAnggota', ['gender' => $gender]));
    }

    public function store(StoreAnggotaRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $anggota = Anggota::create($validatedData);

        if ($anggota) {
            return redirect(route('anggota.anggota'))->with('success', 'Data Anggota Berhasil Ditambahkan');
        } else {
            return redirect(route('anggota.anggota'))->with('error', 'Data Anggota Gagal Ditambahkan');
        }
    }

    public function show(string $id): Response
    {
        dd('show');
    }

    public function edit(string $id): Response
    {
        $gender = GenderEnum::cases();
        $anggota = Anggota::where('id_anggota', $id)->firstOrFail();
        return response(view('anggota.editAnggota', ['anggota' => $anggota, 'gender' => $gender]));
    }

    public function update(UpdateAnggotaRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();
        $affected = DB::table('anggota')
            ->where('id_anggota', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('anggota.anggota'))->with('success', 'Data Anggota Berhasil Diubah');
        } else {
            return redirect(route('anggota.anggota'))->with('error', 'Data Anggota Gagal Diubah');
        }
    }

    public function destroy(string $id): RedirectResponse
    {
        $deleted = DB::table('anggota')
            ->where('id_anggota', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('anggota.anggota'))->with('success', 'Data Anggota Berhasil Dihapus');
        } else {
            return redirect(route('anggota.anggota'))->with('error', 'Data Anggota Gagal Dihapus');
        }
    }
}
