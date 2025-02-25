import Echo from 'laravel-echo';

import Pusher from 'pusher-js';
window.Pusher = Pusher;

if (import.meta.env.VITE_ENABLE_WEBSOCKET === 'true') {
    import('laravel-echo').then(({ default: Echo }) => {
        import('pusher-js').then(({ default: Pusher }) => {
            window.Pusher = Pusher;

            window.Echo = new Echo({
                broadcaster: 'pusher',
                key: import.meta.env.VITE_PUSHER_APP_KEY,
                cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
                wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
                wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
                wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
                forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
                enabledTransports: ['ws', 'wss'],
            });
        });
    });
}

