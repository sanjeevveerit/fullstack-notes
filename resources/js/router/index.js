import { createRouter, createWebHistory } from 'vue-router'
import Login from '../pages/Login.vue'
import Notes from '../pages/Notes.vue'

const routes = [
  { path: '/', component: Login , meta: { guest: true } },
  { path: '/notes', component: Notes, meta: {requiresAuth: true} },

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

router.beforeEach((to, from, next) => {
  const token = localStorage.getItem('token')

  if (to.meta.requiresAuth && !token) {
    next('/')
  } else if (to.meta.guest && token) {
    next('/notes')
  } else {
    next()
  }
})

export default router
