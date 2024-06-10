import {createRouter, createWebHistory } from 'vue-router'
import Home from './controllers/Home.vue'
import { components } from 'vuetify/dist/vuetify-labs.js'

const routes = [
    {
        path: '/',
        name: 'home',
        components: Home,
       
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router

