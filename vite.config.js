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
                'resources/js/website/welcomeBanner.js',
                'resources/js/website/vue/posts/app.ts',
                'resources/js/flasher/flasher-noty.min.js',
                'resources/js/flasher/flasher.min.js',
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
        obfuscator()
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
