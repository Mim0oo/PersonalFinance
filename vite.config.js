import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            cssCodeSplit: false,
            input: [
                'resources/sass/app.scss',
                'resources/sass/custom.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
