<div class="chat-container">
    <h2>Chat with {{ $user->name }}</h2>

    <div class="messages">
        @foreach ($messages as $message)
            <div class="{{ $message->sender_id === Auth::id() ? 'sent' : 'received' }}">
                <p>{{ $message->message }}</p>
                <small>{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send', $user->id) }}" method="POST">
        @csrf
        <textarea name="message" rows="3" placeholder="Type a message..." required></textarea>
        <button type="submit">Send</button>
    </form>
</div>
