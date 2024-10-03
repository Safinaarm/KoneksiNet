<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Chat Messages</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('chat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea name="message" id="message" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="document">Upload Document:</label>
                <input type="file" name="document" id="document" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Send Chat</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary mb-3">Kembali ke Dashboard</a>
        </form>

        <hr>

        <h4>Previous Messages:</h4>
        <ul class="list-group">
            @foreach($chats as $chat)
                <li class="list-group-item">
                    <strong>Message:</strong> {{ $chat->message }} <br>
                    <strong>Email:</strong> {{ $chat->email }} <br>
                    @if($chat->image)
                        <img src="{{ asset('storage/' . $chat->image) }}" alt="Image" width="100">
                    @endif
                    @if($chat->document)
                        <a href="{{ asset('storage/' . $chat->document) }}" target="_blank">View Document</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
