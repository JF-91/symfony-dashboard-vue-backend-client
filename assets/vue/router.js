import {createRouter, createWebHistory } from 'vue-router'
import Home from './controllers/Home.vue'
import Post from '../pages/post/Post.vue'


const routes = [
    {
        path: '',
        name: 'home',
        components: Home,
       
    },
    {
        path: 'posts',
        name: 'post',
        components: Post,
    },
]

const router = createRouter({
    history: createWebHistory(),
    base: '/admin/',
    routes,
})

export default router
