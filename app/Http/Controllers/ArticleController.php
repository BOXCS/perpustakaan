<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'tanggal' => 'required|date',
            'judul' => 'required',
            'isi' => 'required',
            'status' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'id_kategori' => 'required',
        'tanggal' => 'required|date',
        'judul' => 'required',
        'isi' => 'required',
        'status' => 'required',
    ]);

    $article = Article::findOrFail($id);
    $article->update($request->all());

    return redirect()->route('articles.index')->with('success', 'Data berhasil diupdate');
}

public function destroy($id)
{
    $article = Article::findOrFail($id);
    $article->delete();

    return redirect()->route('articles.index')->with('success', 'Data berhasil dihapus');
}

}
