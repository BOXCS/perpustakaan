<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = ['id_kategori', 'Tanggal', 'Judul', 'Isi', 'Status'];

    public function kategori() {
        return $this->belongsToMany(Kategori::class);
    }
}
