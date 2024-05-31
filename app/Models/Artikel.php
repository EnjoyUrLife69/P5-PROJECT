<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = ['id' , 'judul' , 'tanggal_publikasi' , 'penulis_id' , 'kategori_id' , 'cover' , "deskripsi", "isi"];
    public $timestamps = true;

    public function penulis()
    {
        return $this->BelongsTo(Penulis::class, 'penulis_id');
    }
    public function kategori()
    {
        return $this->BelongsTo(Kategori::class, 'kategori_id');
    }

    //menghapus img
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/artikel' . $this->cover))) {
            return unlink(public_path('images/artikel' . $this->cover));
        }
    }

}
