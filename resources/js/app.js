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

app.use(router);
app.mount("#app");
