import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
// let mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
// .vue()
// .postCss('resources/css/app.css', 'public/css', [
// ]);