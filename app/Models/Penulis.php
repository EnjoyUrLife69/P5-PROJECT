<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $fillable = ['id' , 'nama_penulis' , 'email'];
    public $timestamps = true;

    // relasi ke tabel artikel
    public function artikel()
    {
        return $this->hasMany(Artikel::class);
    }

    //menghapus img
    public function deleteImage()
    {
        if ($this->foto_profil && file_exists(public_path('images/penulis' . $this->foto_profil))) {
            return unlink(public_path('images/penulis' . $this->foto_profil));
        }
    }
}
