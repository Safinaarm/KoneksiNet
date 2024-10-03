<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Chat Message</title>
</head>
<body>
    <h4>You have received a new message:</h4>

    {{-- <p>{{ $message }}</p> --}}

    @if($image)
        <p>Attached Image:</p>
        <img src="{{ asset('storage/' . $image) }}" alt="Image" width="200">
    @endif

    @if($document)
        <p>Attached Document: <a href="{{ asset('storage/' . $document) }}" target="_blank">Download Here</a></p>
    @endif
</body>
</html>
