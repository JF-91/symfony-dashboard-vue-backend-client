import { createRouter, createMemoryHistory } from "vue-router";


const routes = [
    {
        path: "/",
        component: () => import(/* webpackChunkName: "home" */ "../pages/home/Home.vue"),
    },
];

 const router = createRouter({
    history: createMemoryHistory(),
    base: "/admin/",
    routes,
});

export default router;