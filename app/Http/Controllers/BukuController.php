<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Category;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Rak;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databuku = Buku::All();
        return view('buku.buku', compact('databuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataRak = Rak::all();
        $dataPenerbit = Penerbit::all();
        $dataKategori = Category::all();

        return view('buku.tambahBuku', compact('dataRak', 'dataPenerbit', 'dataKategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBukuRequest $request)
    {
        $validatedData = $request->validated();

        $buku = new Buku();
        $buku->isbn = $validatedData['isbn'];
        $buku->id_rak = $validatedData['id_rak'];
        $buku->id_category = $validatedData['id_category'];
        $buku->judul = $validatedData['judul'];
        $buku->sinopsis = $validatedData['sinopsis'];
        $buku->tahun_terbit = $validatedData['tahun_terbit'];
        $buku->jumlah_halaman = $validatedData['jumlah_halaman'];
        $buku->id_penerbit = $validatedData['id_penerbit'];
        $buku->save();

        $penulis = new Penulis();
        $penulis->id_penulis = '1';
        $penulis->nama_penulis = $validatedData['nama_penulis'];
        $penulis->isbn = $validatedData['isbn'];
        $penulis->save();

        if ($buku) {
            return redirect(route('buku.index'))->with('success', 'Data buku Berhasil Ditambahkan');
        } else {
            return redirect(route('buku.index'))->with('error', 'Data buku Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBukuRequest $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
