import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [

                'resources/js/app.ts',
                'resources/js/website/app.ts',
                'resources/js/website/header.ts',
                'resources/css/website.css',
        ],
            refresh: true,
        }),

        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    server: {
        watch: {
          ignored: ["**/storage/**","**/vendor/**"],
        },
      },
    resolve: {
        alias: {
          '@': fileURLToPath(new URL('./resources/js', import.meta.url))
        }
      }
});
