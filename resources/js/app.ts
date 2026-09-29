import "../css/index.css";
import "../css/scrollbar.css";
import "../css/themes.css";
import "../css/chart-theme.css";
import "vue-sonner/style.css";

import { createInertiaApp } from "@inertiajs/vue3";

import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

import { createSSRApp, h } from "vue";

import { ZiggyVue } from "ziggy-js";
import { i18n } from "@/lib/utils";


void createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.vue`,
            import.meta.glob("./pages/**/*.vue"),
        ),

    setup({ el, App, props, plugin }) {
        createSSRApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue)
            .mount(el);
    },
});
