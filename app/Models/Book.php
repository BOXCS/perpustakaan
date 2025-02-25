<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = ['nama', 'harga', 'stok'];

    public function kategori() {
        return $this->belongsToMany(Kategori::class);
    }
}
