<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detail Pesan</h1>

        <h5 class="mt-4">Percakapan</h5>
        <ul class="list-group">
            @foreach($messages as $message)
                <li class="list-group-item">
                    <strong>Dari:</strong> {{ $message->sender }}<br>
                    <strong>Kepada:</strong> {{ $message->recipient }}<br>
                    <strong>Pesan:</strong> {{ $message->message_text }}<br>
                    <small>{{ $message->created_at->format('d-m-Y H:i') }}</small>
                </li>
            @endforeach
        </ul>

        <h5 class="mt-4">Balas Pesan</h5>
        <form action="{{ route('reply-message', $sentMessage->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="reply_text" class="form-control" rows="3" placeholder="Tulis balasan Anda..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Balasan</button>
            <a href="{{ route('messages.create') }}" class="btn btn-secondary mb-3">Kembali </a>
        </form>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
