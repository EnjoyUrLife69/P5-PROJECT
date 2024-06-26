<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\Penulis;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = Kategori::all();

        // Ambil ID kategori dari request
        $kategori_id = $request->get('kategori_id');

        // Jika kategori_id ada dan tidak kosong, filter artikel berdasarkan kategori tersebut
        if ($kategori_id) {
            $artikel = Artikel::where('kategori_id', $kategori_id)->get();
        } else {
            // Jika tidak, ambil semua artikel
           $artikel = Artikel::orderBy('created_at', 'desc')->get();

        }

        return view('artikel.index', compact('artikel', 'kategori', 'kategori_id'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = Penulis::all();
        $kategori = Kategori::all();
        return view('artikel.create', compact('penulis', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_publikasi' => 'required',
            'cover' => 'required|max:5400|mimes:png,jpg,webp',
            'deskripsi' => 'required',
            'isi' => 'required',
        ]);

        $artikel = new Artikel;
        $artikel->judul = $request->judul;
        $artikel->tanggal_publikasi = $request->tanggal_publikasi;
        $artikel->penulis_id = $request->penulis_id;
        $artikel->kategori_id = $request->kategori_id;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->cover = $name;
        }
        $artikel->deskripsi = $request->deskripsi;
        $artikel->isi = $request->isi;

        $artikel->save();

        return redirect()->route('artikel.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Artikel::FindOrFail($id);
        $penulis = Penulis::all();
        $kategori = Kategori::all();

        return view('artikel.show', compact('artikel', 'penulis', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::FindOrFail($id);
        $penulis = Penulis::all();
        $kategori = Kategori::all();
        return view('artikel.edit', compact('artikel', 'penulis', 'kategori'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal_publikasi' => 'required',
            'cover' => 'max:5400|mimes:png,jpg,webp',
            'deskripsi' => 'required',
            'isi' => 'required',
        ]);

        $artikel = Artikel::FindOrFail($id);
        $artikel->judul = $request->judul;
        $artikel->tanggal_publikasi = $request->tanggal_publikasi;
        $artikel->penulis_id = $request->penulis_id;
        $artikel->kategori_id = $request->kategori_id;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/artikel', $name);
            $artikel->cover = $name;
        }
        $artikel->deskripsi = $request->deskripsi;
        $artikel->isi = $request->isi;

        $artikel->save();

        return redirect()->route('artikel.index')
            ->with('success', 'data berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::FindOrFail($id);
        $artikel->delete();
        return redirect()->route('artikel.index')
            ->with('success', 'data berhasil dihapus');

    }
}
