<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
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
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penulis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penulis' => 'required|string|max:255',
            'email' => 'required|email|unique:penulis,email',
        ]);

        $penulis = new Penulis;
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->email = $request->email;

        if ($request->hasFile('foto_profil')) {
            $img = $request->file('foto_profil');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/penulis', $name);
            $penulis->foto_profil = $name;
        }

        $penulis->save();

        return redirect()->route('penulis.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penulis = Penulis::FindOrFail($id);
        return view('penulis.show', compact('penulis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penulis = Penulis::FindOrFail($id);
        return view('penulis.edit', compact('penulis'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $penulis = Penulis::FindOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->email = $request->email;

        if ($request->hasFile('foto_profil')) {
            $img = $request->file('foto_profil');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/penulis', $name);
            $penulis->foto_profil = $name;
        }

        $penulis->save();
        return redirect()->route('penulis.index')
            ->with('success', 'data berhasil di ubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penulis = Penulis::FindOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index')
            ->with('success', 'data berhasil dihapus');

    }
}
