<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Application Status') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 bg-white shadow-lg rounded-lg">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-700">Chat with {{ $user->name }}</h2>
        </div>

        <!-- Chat Messages -->
        <div id="chat-container" class="p-6 space-y-4 h-96 overflow-y-auto">
            @foreach ($messages as $message)
                <div class="flex {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                    <div class="{{ $message->sender_id === Auth::id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }} max-w-xs p-4 rounded-lg shadow">
                        <p class="text-sm">{{ $message->message }}</p>
                        <small class="block mt-2 text-xs {{ $message->sender_id === Auth::id() ? 'text-blue-200' : 'text-gray-500' }}">
                            {{ $message->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Message Form -->
        <div class="p-6 bg-gray-100 border-t border-gray-200">
            <form action="{{ route('chat.send', $user->id) }}" method="POST" class="flex space-x-4">
                @csrf
                <textarea name="message" rows="2" placeholder="Type a message..." required
                          class="flex-grow p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"></textarea>
                <button type="submit"
                        class="px-6 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                    Send
                </button>
            </form>
        </div>
    </div>

    <!-- Scroll-to-Bottom Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const chatContainer = document.getElementById('chat-container');
            chatContainer.scrollTop = chatContainer.scrollHeight;
        });
    </script>
</x-app-layout>
