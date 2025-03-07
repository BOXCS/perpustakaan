<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'id_kategori' => 1,
                'tanggal' => '2016-10-15',
                'judul' => 'agus',
                'isi' => 'asd',
                'status' => 2,
            ],
            [
                'id_kategori' => 2,
                'tanggal' => '2017-03-11',
                'judul' => 'sadaasdasdasd',
                'isi' => 'sdasd',
                'status' => 1,
            ],
            [   
                'id_kategori' => 1,
                'tanggal' => '2017-10-25',
                'judul' => 'agus',
                'isi' => 'aadsa',
                'status' => 2,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}