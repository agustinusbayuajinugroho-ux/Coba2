<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="mb-4">{{ isset($book) ? 'Edit Buku' : 'Tambah Buku' }}</h2>
        <form method="POST" action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}"  enctype="multipart/form-data">
            @csrf
            @if(isset($book))
            @method('PUT')
            @endif

            <div class="mb-3">
                <label for="kategori" class="form-label">Pilih Jenis</label>
                <select class="form-select" id="book_type_id" name="book_type_id" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach($bookTypes as $bookType)
                        <option value="{{ $bookType->id }}" {{ $bookType->id == old('book_type_id', $book->book_type_id?? '') ? ' selected' : '' }}>{{ $bookType->name }}</option>
                    @endforeach
                </select>
            </div>            

            <div class="mb-3">
                <label for="title" class="form-label">Nama Buku</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $book->title ?? '') }}">
                @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="synopsis" class="form-label">Deskripsi Buku</label>
                <input type="text" name="synopsis" id="synopsis"
                    class="form-control @error('note') is-invalid @enderror"
                    value="{{ old('synopsis', $book->synopsis ?? '') }}">
                @error('synopsis')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if(isset($book) && $book->image)
                    <p class="mt-2">Gambar saat ini:</p>
                    <img src="{{ asset('storage/' . $book->image) }}" width="200">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>