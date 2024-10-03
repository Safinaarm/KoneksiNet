<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kirim Pesan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Kirim Pesan Baru</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol Kembali -->
        <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>

        <form action="{{ route('send-message') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="recipient" class="form-control" placeholder="Masukkan email tujuan" required>
            </div>
            <div class="form-group">
                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <textarea name="message_text" class="form-control" rows="3" placeholder="Tulis pesan Anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
        <ul class="list-group">
            @foreach($sentMessages as $sentMessage)
                <li class="list-group-item">
                    <strong>Dari:</strong> {{ $sentMessage->sender}}<br>
                    <strong>Kepada:</strong> {{ $sentMessage->recipient}}<br>
                    <strong>Subjek:</strong> {{ $sentMessage->subject }}<br>
                    <strong>Pesan:</strong> {{ $sentMessage->message_text }}<br>
                    <small>{{ $sentMessage->created_at->format('d-m-Y H:i') }}</small>
                    <br>
                    <a href="{{ route('messages.detail', $sentMessage->id) }}" class="btn btn-secondary btn-sm mt-2">Balas</a>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
