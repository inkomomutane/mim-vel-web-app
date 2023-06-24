import { createApp, defineAsyncComponent } from "vue";
import PrimeVue from 'primevue/config';
import "primevue/resources/primevue.min.css";
import { createPinia } from "pinia";
const app = createApp(defineAsyncComponent(() => import ('./App.vue')))
app.use(createPinia())
app.use(PrimeVue).mount('#posts');
