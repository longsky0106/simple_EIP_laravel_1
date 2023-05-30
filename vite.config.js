import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const ROUTES_PREFIX = process.env.ROUTES_PREFIX || '';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                ROUTES_PREFIX + 'resources/css/app.css', 
                ROUTES_PREFIX + 'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
