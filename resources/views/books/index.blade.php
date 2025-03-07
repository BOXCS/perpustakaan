@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agus Bijj</h1>
    
    <div class="d-flex justify-content-between mb-3">
        <nav>
            <a href="/" class="btn btn-link">Home</a>
            <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah</a>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>id kategori</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $key => $post)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $post->kategori_id }}</td>
                        <td>{{ $post->tanggal }}</td>
                        <td>{{ $post->judul }}</td>
                        <td>{{ Str::limit($post->isi, 50) }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <a href="{{ route('books.edit', $post->id) }}" class="btn btn-sm btn-warning">✏️</a>
                            <form action="{{ route('books.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$post->id}}">🗑️</button>
                                
                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal{{$post->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Konfirmasi Hapus</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah yakin data akan di hapus?
                                                <p><strong>{{ $post->judul }}</strong></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">OK</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection