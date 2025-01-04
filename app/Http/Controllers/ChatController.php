<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::where(function ($query) use ($user) {
            $query->where('sender_id', Auth::id())
                  ->where('receiver_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('sender_id', $user->id)
                  ->where('receiver_id', Auth::id());
        })->orderBy('created_at', 'asc')->get();

        return view('chat.index', compact('messages', 'user'));
    }

    public function send(Request $request, User $user)
    {
        $request->validate(['message' => 'required|string|max:1000']);

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $user->id,
            'message' => $request->message,
        ]);

        return redirect()->route('chat.index', $user->id);
    }
}
