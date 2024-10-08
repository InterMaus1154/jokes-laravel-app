import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/general.css', 'resources/js/app.js'],
            refresh: [
                'resources/views/**',
                'public/css/app.css',
                'public/css/general.css',
                'public/css/header.css',
                'public/css/response.css'
            ],
        }),
    ],
});
