<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('auth')->except(['index', 'show']);
        // $this->middleware('guest')->only(['create']);
        $this->middleware('auth')->only(['store', 'update', 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Book $book)
    {
        // return $book->all();
        // Ambil semua data buku dari database
        $books = Book::all();

        // Kirim data $books ke view
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'tanggal' => 'required|date',
            'judul' => 'required|max:255',
            'isi' => 'required',
            'status' => 'required'
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success','Data Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Menampilkan buku ddengan ID: . $id ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Form edit buku dengan ID: $id";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return "Mengupdate buku dengan ID: $id";
        $book = Book::find(1);
        $book->harga = 16000000;
        $book->save();

        return redirect()->route('books', BookController::class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // return "Menghapus buku dengan ID: . $id";
        $book = Book::find(1);
        $book->delete();
    }
}
