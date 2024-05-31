<?php

namespace App\Http\Controllers;
use App\Models\Artikel;

use Illuminate\Http\Request;

class TampilController extends Controller
{
    public function tampil($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('tampil', compact('artikel'));
    }
}
