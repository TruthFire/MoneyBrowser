import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/auth.css',
                'resources/css/modal.css',
                'resources/js/app.js',
                'resources/js/ui.js',
                'resources/js/payout.js'
            ],
            refresh: true,
        }),
    ],
});
