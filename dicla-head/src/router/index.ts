import { createRouter, createWebHistory } from 'vue-router'

import HomeView from '@/pages/home/HomeView.vue'
import AboutUsView from '@/pages/about-us/AboutUsView.vue'
import ContactView from '@/pages/contact/ContactView.vue'
import DiscoverView from '@/pages/discover/DiscoverView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about-us',
      name: 'about-us',
      component: AboutUsView,
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView,
    },
    {
      path: '/discover',
      name: 'discover',
      component: DiscoverView,
    },
  ],
})

export default router
