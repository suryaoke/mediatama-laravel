<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriCreateRequest;
use App\Http\Requests\KategoriUpdateRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::OrderBy('name', 'asc')->get();
        return view('backend.kategori.index', compact('kategori'));
    } // End Method

    public function create(KategoriCreateRequest $request)
    {

        $data = $request->validated();

        Kategori::create($data);


        session()->flash('success', 'Kategori Created Successfully.');

        return redirect()->route('admin.kategori.all');
    } // End Method
    public function update(KategoriUpdateRequest $request, $kategori)
    {

        $kategori = Kategori::findOrFail($kategori);

        $data = $request->validated();


        $kategori->update($data);


        session()->flash('success', 'Kategori berhasil diperbarui.');


        return redirect()->route('admin.kategori.all');
    }



    public function delete($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('admin.kategori.all');
    } // end method
}
