<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Book List</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif        
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">+ Tambah Buku</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Jenis Buku</th>                    
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>
                        @if($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" width="150">
                        @else
                            <span class="text-muted">Tidak ada gambar</span>
                        @endif
                    </td>    
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->bookType->name }}</td>                    
                    <td>{{ $book->synopsis }}</td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>