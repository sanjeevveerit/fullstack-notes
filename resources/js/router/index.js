import { createRouter, createWebHistory } from 'vue-router'
import Login from '../pages/Login.vue'
import Notes from '../pages/Notes.vue'

const routes = [
  { path: '/', component: Login },
  { path: '/notes', component: Notes }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
