<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['id' , 'nama_kategori' , 'deskripsi'];
    public $timestamps = true;

    // // relasi ke tabel artikel
    // public function artikel()
    // {
    //     return $this->hasMany(Artikel::class);
    // }

}
