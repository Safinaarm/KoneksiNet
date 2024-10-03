<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Barang</title>
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #e9f3ff;
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .page-header {
            background-color: #0056b3;
            color: white;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #007bff;
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #0056b3;
        }
        .btn-primary {
            background-color: #0056b3;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #004494;
        }
        h4 {
            margin-top: 30px;
            color: #0056b3;
            font-weight: bold;
        }
        table th {
            background-color: #0056b3;
            color: white;
            border-top: 2px solid #004494;
        }
        table td {
            background-color: #ffffff;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="page-header text-center">
                    <h3 class="page-title">Add Barang</h3>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.store-barang') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama Barang</label>
                                        <input type="text" class="form-control" id="name" name="nama_barang" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="deskripsi" rows="4" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control" id="price" name="harga" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Kuantitas</label>
                                        <input type="number" class="form-control" id="quantity" name="stok" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah Barang</button>
                                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
                                </form>

                                <h4>Daftar Barang</h4>
                                <table class="table table-striped mt-4">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                            <th>Stok</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($barangs as $barang)
                                            <tr>
                                                <td>{{ $barang->id }}</td>
                                                <td>{{ $barang->nama_barang }}</td>
                                                <td>{{ $barang->deskripsi }}</td>
                                                <td>{{ $barang->harga }}</td>
                                                <td>{{ $barang->stok }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="assets/js/vertical-layout-light.js"></script>
</body>
</html>
