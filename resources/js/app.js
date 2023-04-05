import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import Toast from "vue-toastification";

import Dashboard from "./components/Dashboard";
import "vue-toastification/dist/index.css";

createApp({
    components: {
        Dashboard
    }
}).use(router)
    .use(Toast)
    .mount('#app');
