import { createApp } from "vue";
import PrimeVue from "primevue/config";
import "primevue/resources/primevue.min.css";
import Search from "./Search.vue";
createApp(Search).use(PrimeVue).mount("#welcome-search");
