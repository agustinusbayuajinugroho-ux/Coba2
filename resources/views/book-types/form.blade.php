<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tipe Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">{{ isset($bookType) ? 'Edit Tipe Buku' : 'Tambah Tipe Buku' }}</h2>
        <form method="POST" action="{{ isset($bookType) ? route('book-types.update', $bookType) : route('book-types.store') }}">
            @csrf
            @if(isset($bookType))
            @method('PUT')
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Nama Tipe Buku</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $bookType->name ?? '') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi Tipe Buku</label>
                <input type="text" name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description', $bookType->description ?? '') }}">
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('book-types.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>