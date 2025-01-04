import Echo from "laravel-echo";
import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
window.Pusher = require("pusher-js");

window.Echo = new Echo({
    broadcaster: "pusher",
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Listening for new messages
window.Echo.channel('chat.' + receiverId)
    .listen('MessageSent', (e) => {
        console.log(e.message);
        // Update the chat view dynamically (e.g., append the new message)
        // Optionally, use a function to add the message to the chat container
    });
