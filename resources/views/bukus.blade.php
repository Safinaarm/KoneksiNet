<!-- resources/views/bukus.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar dan Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table thead {
            background-color: #343a40;
            color: white;
        }
        .btn-back {
            margin-bottom: 20px;
        }
        .form-control {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-back">Kembali ke Dashboard</a>

        <h1 class="mb-4">Daftar Buku</h1>

        <!-- Tabel Data Buku -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Kode</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                    <tr>
                        <td>{{ $buku->id }}</td>
                        <td></td>
                        <td>{{ $buku->kode }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->pengarang }}</td>
                        <td>
                            
                          
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="mt-5">Tambah Buku Baru</h2>

        <!-- Tampilkan error validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Tambah Buku -->
        <form action="{{ route('bukus.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id_kategori" class="form-label">Kategori:</label>
                <select name="id_kategori" id="id_kategori" class="form-control" required>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kode" class="form-label">Kode Buku:</label>
                <input type="text" name="kode" id="kode" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">Judul Buku:</label>
                <input type="text" name="judul" id="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang:</label>
                <input type="text" name="pengarang" id="pengarang" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</body>
</html>
