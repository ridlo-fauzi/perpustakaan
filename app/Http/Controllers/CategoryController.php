<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datakategori = Category::all();
        return view('kategori.kategori', compact('datakategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.tambahKategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
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
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Category::where('id_category', $id)->firstOrFail();
        return response(view('kategori.editKategori', ['kategori' => $kategori]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
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
    public function destroy(string $id)
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