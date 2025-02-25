<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->nama }}</td>
            <td>{{ $book->harga }}</td>
            <td>{{ $book->stok }}</td>
            <td>
                <a href="{{ route('books.edit', $book->id) }}">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <a href="{{ route('books.create') }}">Tambah Buku</a>
</body>
</html>