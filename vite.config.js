import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/assets/backend/js/app.js',
            'resources/assets/backend/js/errors.js',
            'resources/assets/backend/js/pages/*.js',
            'resources/assets/website/js/app.js',
            'resources/assets/website/js/pages/',
        ]),
    ],
});
