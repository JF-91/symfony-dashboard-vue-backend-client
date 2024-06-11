import { createRouter, createMemoryHistory } from "vue-router";


const routes = [
    {
        path: "/",
        name: "home",
        component: () => import(/* webpackChunkName: "home" */ "../pages/home/Home.vue"),
    },
    {
        path: "/posts",
        name: "posts",
        component: () => import(/* webpackChunkName: "posts" */ "../pages/post/Post.vue"),
    }
];

 const router = createRouter({
    history: createMemoryHistory(),
    base: "/admin/",
    routes,
});

export default router;