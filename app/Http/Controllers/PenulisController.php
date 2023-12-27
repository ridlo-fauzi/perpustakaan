<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Response;
use App\Models\Penulis;
use App\Http\Requests\StorePenulisRequest;
use App\Http\Requests\UpdatePenulisRequest;
// use Illuminate\Http\RedirectResponse;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapenulis = Penulis::all();
        return view('penulis.penulis', compact('datapenulis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penulis.tambahPenulis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenulisRequest $request)
    {
        $validatedData = $request->validated();

        $penulis = new Penulis();
        $penulis->id_penulis = $validatedData['id_penulis'];
        $penulis->isbn = 0;
        $penulis->nama_penulis = $validatedData['nama_penulis'];
        $penulis->save();

        if ($penulis) {
            return redirect(route('penulis.penulis'))->with('success', 'Data penulis Berhasil Ditambahkan');
        } else {
            return redirect(route('penulis.penulis'))->with('error', 'Data penulis Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Penulis $penulis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penulis $penulis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenulisRequest $request, Penulis $penulis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penulis $penulis)
    {
        //
    }
}
