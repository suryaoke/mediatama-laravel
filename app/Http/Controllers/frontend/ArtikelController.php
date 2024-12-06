<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikel = Artikel::all();
        $artikelTerbaru = Artikel::latest()->first();
        $kategori = Kategori::all();
        return view('frontend.index', compact('artikel', 'artikelTerbaru', 'kategori'));
    }

    public function kategori()
    {

        $kategori = Kategori::all();
        return view('frontend.kategori', compact('kategori'));
    }
    public function detail($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('frontend.detail', compact('artikel'));
    }
}
