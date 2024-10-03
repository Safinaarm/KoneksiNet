<div class="chat-container">
    <div class="messages">
        @foreach($messages as $msg)
            <div class="message">
                <strong>{{ $msg->user->name }}:</strong> {{ $msg->message }}
            </div>
        @endforeach
    </div>

    <form wire:submit.prevent="sendMessage">
        <input type="text" wire:model="message" placeholder="Type your message..." />
        <button type="submit">Send</button>
    </form>
</div>

<style>
    .chat-container {
        width: 300px;
        border: 1px solid #ccc;
        padding: 10px;
        overflow: hidden;
    }
    .messages {
        max-height: 200px;
        overflow-y: auto;
        margin-bottom: 10px;
    }
    .message {
        padding: 5px;
    }
</style>
