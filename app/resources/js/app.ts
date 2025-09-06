import "./bootstrap";
import "primevue/resources/primevue.min.css";
import "../css/app.css";

import { createApp, h, DefineComponent } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";
import PrimeVue from "primevue/config";
import Tooltip from "primevue/tooltip";
import CKEditor from "@ckeditor/ckeditor5-vue";
import ConfirmationService from "primevue/confirmationservice";
import.meta.glob(["../errors/svgs/**", "../js/images/**"]);

createInertiaApp({
    title: (title) => `${title}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob<DefineComponent>("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue)
            .directive("tooltip", Tooltip)
            .use(CKEditor)
            .use(ZiggyVue, Ziggy)
            .use(ConfirmationService)
            .mount(el);
    },
    progress: {
        color: "#ff6b01",
    },
});
