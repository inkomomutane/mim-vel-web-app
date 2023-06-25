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
                'resources/js/website/vue/welcomeSearch.ts',
                'resources/js/website/welcomeBanner.js',
                'resources/js/website/vue/posts/app.ts',
                'resources/css/website.css',
                'resources/errors/svgs/401.svg',
                'resources/errors/svgs/403.svg',
                'resources/errors/svgs/404.svg',
                'resources/errors/svgs/419.svg',
                'resources/errors/svgs/503.svg',
                'resources/js/images/placeholder.svg',
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
