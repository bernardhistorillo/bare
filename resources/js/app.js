import './bootstrap';
import 'jquery/dist/jquery.min';
import 'bootstrap/dist/js/bootstrap.bundle.min';
import { createApp } from "vue";
import { createRouter, createWebHistory } from "vue-router";
import Routes from "./routes";
import NotFound from './components/NotFound.vue';

const app = createApp({});

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});

router.beforeEach((to, from, next) => {
    document.body.scrollIntoView({ behavior: 'auto', block: 'start' });
    next();
});

app.use(router);
app.mount("#app");
