<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArtikelCreateRequest;
use App\Http\Requests\ArtikelUpdateRequest;
use App\Models\Artikel;
use App\Models\ArtikelKategori;
use App\Models\ArtikelTag;
use App\Models\Author;
use App\Models\Kategori;
use App\Models\Tag;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        //$artikel = Artikel::OrderBy('title', 'asc')->get();
        $artikel = Artikel::with(['kategoris', 'tags', 'author'])->get();

        $author = Author::all();
        $kategori = Kategori::all();
        $tag = Tag::all();

        return view('backend.artikel.index', compact('artikel', 'author', 'kategori', 'tag'));
    } // End Method

    public function create(ArtikelCreateRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '_' . $foto->getClientOriginalName();
            $path = 'images/artikel/' . $filename;
            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            Storage::disk('public')->put($path, (string) $image->encode());
            $data['foto'] = $path;
        }


        $artikel = Artikel::create($data);

        // create Artikel Kategori //
        ArtikelKategori::create([
            'artikel_id' => $artikel->id,
            'kategori_id' => $data['kategori_id'],
        ]);

        // create Artikel Tag //
        ArtikelTag::create([
            'artikel_id' => $artikel->id,
            'tag_id' =>  $data['tag_id'],
        ]);

        session()->flash('success', 'Artikel Created Successfully.');

        return redirect()->route('admin.artikel.all');
    } // End Method



    public function update(ArtikelUpdateRequest $request, $artikel)
    {

        $artikel = Artikel::findOrFail($artikel);

        $data = $request->validated();

        if ($request->hasFile('foto')) {
            if ($artikel->foto) {
                Storage::disk('public')->delete($artikel->foto);
            }

            $foto = $request->file('foto');


            $filename = time() . '_' . $foto->getClientOriginalName();

            $path = 'images/artikel/' . $filename;


            $image = Image::make($foto)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });

            Storage::disk('public')->put($path, (string) $image->encode());


            $data['foto'] = $path;
        } else {
            $data['foto'] = $artikel->foto;
        }

        $artikel->update($data);


        // update Artikel Kategori //
        if (isset($data['kategori_id'])) {
            $artikelKategori = ArtikelKategori::where('artikel_id', $artikel->id)->first();
            if ($artikelKategori) {
                $artikelKategori->update([
                    'kategori_id' => $data['kategori_id'],
                ]);
            }
        }

        // Update artikel_tag //
        if (isset($data['tag_id'])) {
            $artikelTag = ArtikelTag::where('artikel_id', $artikel->id)->first();
            if ($artikelTag) {
                $artikelTag->update([
                    'tag_id' => $data['tag_id'],
                ]);
            }
        }


        session()->flash('success', 'Artikel berhasil diperbarui.');


        return redirect()->route('admin.artikel.all');
    }


    public function delete($id)
    {
        $artikel = Artikel::findOrFail($id);

        ArtikelKategori::where('artikel_id', $artikel->id)->delete();


        ArtikelTag::where('artikel_id', $artikel->id)->delete();

        $artikel->delete();


        session()->flash('success', 'Artikel berhasil dihapus.');


        return redirect()->route('admin.artikel.all');
    }
    // end method
}
