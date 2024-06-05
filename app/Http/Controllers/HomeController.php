<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
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

        return view('home', compact('artikel', 'kategori', 'kategori_id'));

    }
}
