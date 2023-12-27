<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Http\Requests\StoreRakRequest;
use App\Http\Requests\UpdateRakRequest;
use Illuminate\Support\Facades\DB;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datarak = Rak::All();
        return view('rak.rak', compact('datarak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rak.tambahRak');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRakRequest $request)
    {
        $validatedData = $request->validated();
        $rak = Rak::create($validatedData);

        if ($rak) {
            return redirect(route('rak.index'))->with('success', 'Data rak Berhasil Ditambahkan');
        } else {
            return redirect(route('rak.index'))->with('error', 'Data rak Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rak = Rak::where('id_rak', $id)->firstOrFail();
        return response(view('rak.editRak', ['rak' => $rak]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRakRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('rak')
            ->where('id_rak', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('rak.index'))->with('success', 'Data Rak Berhasil Diubah');
        } else {
            return redirect(route('rak.index'))->with('error', 'Data Rak Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('rak')
            ->where('id_rak', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('rak.index'))->with('success', 'Data Anggota Berhasil Dihapus');
        } else {
            return redirect(route('rak.index'))->with('error', 'Data Anggota Gagal Dihapus');
        }
    }
}