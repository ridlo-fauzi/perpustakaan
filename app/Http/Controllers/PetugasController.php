<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Enums\GenderEnum;
use App\Enums\RoleEnum;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePetugasRequest;
use App\Http\Requests\UpdatePetugasRequest;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return response(view('petugas.petugas', ['petugas' => $petugas]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $gender = GenderEnum::cases();
        $role = RoleEnum::cases();
        return response(view('petugas.tambahPetugas', ['gender' => $gender, 'role' => $role]));
    }

    public function edit(string $id): Response
    {
        $gender = GenderEnum::cases();
        $role = RoleEnum::cases();
        $petugas = User::where('id_user', $id)->firstOrFail();
        return response(view('petugas.editPetugas', ['petugas' => $petugas, 'gender' => $gender, 'role' => $role]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePetugasRequest $request, string $id): RedirectResponse
    {
        $validatedData = $request->validated();

        // Hash password jika ada perubahan
        if (isset($validatedData['password'])) {
            $validatedData['password'] = $validatedData['password'];
        } else {
            // Jika password tidak dirubah, hapus kunci password dari data yang akan disimpan
            unset($validatedData['password']);
        }

        $affected = DB::table('users')
            ->where('id_user', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('petugas.petugas'))->with('success', 'Data Petugas Berhasil Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $deleted = DB::table('users')
            ->where('id_user', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('petugas.petugas'))->with('success', 'Data Petugas Berhasil Dihapus');
        }

        return redirect(route('petugas.petugas'))->with('error', 'Data Petugas Gagal Dihapus');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePetugasRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $petugas = User::create($validatedData);

        if ($petugas) {
            return redirect(route('petugas.petugas'))->with('success', 'Data Petugas Berhasil Ditambahkan');
        } else {
            return redirect(route('petugas.petugas'))->with('error', 'Data Petugas Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
}
