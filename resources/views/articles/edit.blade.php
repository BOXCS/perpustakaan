@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Artikel</h2>

    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>ID Kategori</label>
            <input type="number" name="id_kategori" class="form-control" value="{{ $article->id_kategori }}" required>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $article->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $article->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" required>{{ $article->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $article->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="2" {{ $article->status == 2 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@if(session('success'))
<script>
    Swal.fire("Sukses!", "{{ session('success') }}", "success");
</script>
@endif
@endsection
