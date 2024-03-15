//import { viteStaticCopy } from 'vite-plugin-static-copy'
import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
        /*
        viteStaticCopy({
            targets: [
                {
                    src: 'resources/js/apps/app-expert_advisor.js',
                    dest: 'js/apps'
                }
            ]
        })
        */
    ],
});
