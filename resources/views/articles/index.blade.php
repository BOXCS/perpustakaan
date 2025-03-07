@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Artikel</h2>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">+ Tambah</a>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <script>
        Swal.fire("Sukses!", "{{ session('success') }}", "success");
    </script>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Kategori</th>
                <th>Tanggal</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $index => $article)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $article->id_kategori }}</td>
                <td>{{ $article->tanggal }}</td>
                <td>{{ $article->judul }}</td>
                <td>{{ Str::limit($article->isi, 50) }}</td>
                <td>{{ $article->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-pen"></i> <!-- Icon Edit -->
                    </a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm delete-confirm">
                            <i class="fas fa-trash"></i> <!-- Icon Delete -->
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.querySelectorAll('.delete-confirm').forEach(button => {
        button.addEventListener('click', function() {
            Swal.fire({
                title: "Yakin ingin menghapus?",
                text: "Data akan dihapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.parentElement.submit();
                }
            });
        });
    });
</script>
@endsection
