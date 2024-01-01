<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePenerbitRequest;
use App\Http\Requests\StoreRakRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\UpdatePenerbitRequest;
use App\Http\Requests\UpdateRakRequest;
use App\Models\Category;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Models\Rak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function bukuIndex()
    {
        $databuku = Buku::with('penulis', 'rak', 'kategori', 'penerbit')->get();
        return view('buku.buku', compact('databuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function bukuCreate()
    {
        $dataRak = Rak::all();
        $dataPenerbit = Penerbit::all();
        $dataKategori = Category::all();

        return view('buku.tambahBuku', compact('dataRak', 'dataPenerbit', 'dataKategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function bukuStore(StoreBukuRequest $request)
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
    public function bukuEdit(string $id)
    {
        $buku = Buku::where('isbn', $id)->with('penulis', 'penerbit', 'rak', 'kategori')->firstOrFail();
        $dataRak = Rak::all();
        $dataPenerbit = Penerbit::all();
        $dataKategori = Category::all();
        return response(view('buku.editBuku', compact('buku', 'dataRak', 'dataPenerbit', 'dataKategori')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function bukuUpdate(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'id_rak' => 'required',
            'id_category' => 'required',
            'judul' => 'required',
            'sinopsis' => 'required',
            'tahun_terbit' => 'required',
            'jumlah_halaman' => 'required',
            'id_penerbit' => 'required',
            'nama_penulis' => 'required',
        ]);

        dd($validatedData);

        $buku = Buku::find($id);
        $buku->id_rak = $validatedData['id_rak'];
        $buku->id_category = $validatedData['id_category'];
        $buku->judul = $validatedData['judul'];
        $buku->sinopsis = $validatedData['sinopsis'];
        $buku->tahun_terbit = $validatedData['tahun_terbit'];
        $buku->jumlah_halaman = $validatedData['jumlah_halaman'];
        $buku->id_penerbit = $validatedData['id_penerbit'];
        $buku->save();

        $penulis = Penulis::find($id);
        $penulis->nama_penulis = $validatedData['nama_penulis'];
        $penulis->isbn = $id;
        $penulis->save();

        if ($buku) {
            return redirect(route('buku.index'))->with('success', 'Data buku Berhasil Ditambahkan');
        } else {
            return redirect(route('buku.index'))->with('error', 'Data buku Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function bukuDestroy(string $id)
    {
        $deleted = DB::table('buku')
            ->where('isbn', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('buku.index'))->with('success', 'Data Buku Berhasil Dihapus');
        } else {
            return redirect(route('buku.index'))->with('error', 'Data Buku Gagal Dihapus');
        }
    }

    public function rakIndex()
    {
        $datarak = Rak::All();
        return view('rak.rak', compact('datarak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function rakCreate()
    {
        return view('rak.tambahRak');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function rakStore(StoreRakRequest $request)
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
    public function rakShow(Rak $rak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function rakEdit(string $id)
    {
        $rak = Rak::where('id_rak', $id)->firstOrFail();
        return response(view('rak.editRak', ['rak' => $rak]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function rakUpdate(UpdateRakRequest $request, string $id)
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
    public function rakDestroy(string $id)
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

    public function penerbitIndex()
    {
        $datapenerbit = Penerbit::all();
        return view('penerbit.penerbit', compact('datapenerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function penerbitCreate()
    {
        return view('penerbit.tambahPenerbit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function penerbitStore(StorePenerbitRequest $request)
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
     * Show the form for editing the specified resource.
     */
    public function penerbitEdit(string $id)
    {
        $penerbit = Penerbit::where('id_penerbit', $id)->firstOrFail();
        return response(view('penerbit.editPenerbit', ['penerbit' => $penerbit]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function penerbitUpdate(UpdatePenerbitRequest $request, string $id)
    {
        dd($request);
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
    public function penerbitDestroy(string $id)
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

    public function kategoriIndex()
    {
        $datakategori = Category::all();
        return view('kategori.kategori', compact('datakategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function kategoriCreate()
    {
        return view('kategori.tambahKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function kategoriStore(StoreCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $kategori = Category::create($validatedData);

        if ($kategori) {
            return redirect(route('kategori.index'))->with('success', 'Data kategori Berhasil Ditambahkan');
        } else {
            return redirect(route('kategori.index'))->with('error', 'Data kategori Gagal Ditambahkan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function kategoriEdit(string $id)
    {
        $kategori = Category::where('id_category', $id)->firstOrFail();
        return response(view('kategori.editKategori', ['kategori' => $kategori]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function kategoriUpdate(UpdateCategoryRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $affected = DB::table('category')
            ->where('id_category', $id)
            ->update($validatedData);

        if ($affected) {
            return redirect(route('kategori.index'))->with('success', 'Data kategori Berhasil Diubah');
        } else {
            return redirect(route('kategori.index'))->with('error', 'Data kategori Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function kategoriDestroy(string $id)
    {
        $deleted = DB::table('category')
            ->where('id_category', $id)
            ->delete();

        if ($deleted) {
            return redirect(route('kategori.index'))->with('success', 'Data Kategori Berhasil Dihapus');
        } else {
            return redirect(route('kategori.index'))->with('error', 'Data Kategori Gagal Dihapus');
        }
    }
}
