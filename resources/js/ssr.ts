import { createInertiaApp } from "@inertiajs/vue3";

import createServer from "@inertiajs/vue3/server";

import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

import { renderToString } from "@vue/server-renderer";

import { createSSRApp, h } from "vue";

import { ZiggyVue } from "ziggy-js";
import { i18n } from "@/lib/utils";
import { createPinia } from "pinia";



createServer((page) =>
    createInertiaApp({
        page,

        render: renderToString,

        resolve: (name) =>
            resolvePageComponent(
                `./pages/${name}.vue`,
                import.meta.glob("./pages/**/*.vue"),
            ),

        setup({ App, props, plugin }) {
            const ziggy = {
                ...page.props.ziggy,

                location: new URL(page.props.ziggy.location as string),
            };

            return createSSRApp({
                render: () => h(App, props),
            })
                .use(plugin)
                .use(i18n)
                .use(ZiggyVue, ziggy);
        },
    }),
);
