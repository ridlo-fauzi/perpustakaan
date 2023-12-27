<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use App\Http\Requests\StorePenerbitRequest;
use App\Http\Requests\UpdatePenerbitRequest;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapenerbit = Penerbit::all();
        return view('penerbit.penerbit', compact('datapenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penerbit.tambahPenerbit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenerbitRequest $request)
    {
        $validatedData = $request->validated();
        $penerbit = Penerbit::create($validatedData);

        if ($penerbit) {
            return redirect(route('penerbit.index'))->with('success', 'Data penerbit Berhasil Ditambahkan');
        } else {
            return redirect(route('penerbit.index'))->with('error', 'Data penerbit Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penerbit $penerbit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penerbit = Penerbit::where('id_penerbit', $id)->firstOrFail();
        return response(view('penerbit.editPenerbit', ['penerbit' => $penerbit]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenerbitRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('penerbit')
            ->where('id_penerbit', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('penerbit.index'))->with('success', 'Data penerbit Berhasil Diubah');
        } else {
            return redirect(route('penerbit.index'))->with('error', 'Data penerbit Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleted = DB::table('penerbit')
            ->where('id_penerbit', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('penerbit.index'))->with('success', 'Data penerbit Berhasil Dihapus');
        } else {
            return redirect(route('penerbit.index'))->with('error', 'Data penerbit Gagal Dihapus');
        }
    }
}