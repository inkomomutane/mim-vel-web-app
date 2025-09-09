import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { obfuscator } from 'rollup-obfuscator';
export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.ts',
                'resources/js/website/app.ts',
                'resources/js/website/header.ts',
                'resources/js/website/vue/welcomeSearch.ts',
                'resources/js/website/imovel.ts',
                'resources/js/website/welcomeBanner.ts',
                'resources/js/website/vue/posts/app.ts',
                'resources/js/website/gallery.js',
                'resources/css/website.css',
                'resources/css/nice-select.css',
                'resources/js/nice-selectjs.js',
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
        obfuscator()
    ],
    server: {
        watch: {
          ignored: ["**/storage/**","**/vendor/**"],
        },
        host: '0.0.0.0',
        port: 5173,
        hmr: {
          host: 'localhost',
        },
        https: false,
      },
    resolve: {
        alias: {
          '@': fileURLToPath(new URL('./resources/js', import.meta.url)),
        }
      }
});
