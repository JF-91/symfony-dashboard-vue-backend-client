import {createRouter, createMemoryHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        name: 'home',
        components: () => import("../pages/employees/Home.vue"),
    },
    {
        path: "/posts",
        name: "posts",
        component: () => import("../pages/employees/Posts.vue"),
    }
    
]

const router = createRouter({
    history: createMemoryHistory(),
    base: '/employees/',
    routes,
})

export default router
