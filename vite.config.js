import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
               "resources/css/demo.min.css",
                "resources/css/tabler.min.css",
                "resources/js/app.js",
                "resources/js/tabler.min.js",
                "resources/js/demo-theme.min.js",
            ],
            refresh: true,
        }),
    ],
});
