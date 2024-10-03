<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="mt-4">Manajemen Menu</h1>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('menu.update') }}" method="POST">
        @csrf
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Pilih</th>
                    <th>Menu</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allMenus as $menu)
                <tr>
                    <td>
                        <input type="checkbox" name="menus[]" value="{{ $menu['title'] }}">
                    </td>
                    <td>{{ $menu['title'] }}</td>
                    <td>{{ $menu['url'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
