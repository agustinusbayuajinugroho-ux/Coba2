
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Tipe Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">Master Tipe Buku</h2>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('book-types.create') }}" class="btn btn-primary mb-3">+ Tambah Tipe Buku</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookTypes as $bookType)
                <tr>
                    <td>{{ $bookType->name }}</td>
                    <td>{{ $bookType->description }}</td>
                    <td>
                        <a href="{{ route('book-types.edit', $bookType) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('book-types.destroy', $bookType) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <div class="mt-3">
                {{ $bookTypes->links() }}
            </div>
        </table>
    </div>
</body>

</html>
