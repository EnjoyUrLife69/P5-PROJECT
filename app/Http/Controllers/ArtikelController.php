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
    public function index()
    {
        $artikel = Artikel::all();
        return view('artikel.index' , compact('artikel'));

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
