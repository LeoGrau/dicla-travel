<template>
  <!-- <div class="text-black absolute m-5 ml-[120px]" style="z-index: 99999">
    {{ route.name }}
  </div> -->
  <div
    ref="navbar"
    :class="route.name ? navbarClasses[route.name][level] : navbarClasses['home'][1]"
    class="h-[70px] z-50 w-full flex items-center px-5 justify-between fixed top-0 transition-colors duration-200"
  >
    <h1 class="pacifico-regular text-4xl">Dicla</h1>
    <div class="flex gap-4">
      <RouterLink
        class="open-sans-500 text-sm"
        v-for="(route, index) in routes"
        :to="route.to"
        :key="index"
        >{{ route.pageName }}</RouterLink
      >
    </div>
    <div class="flex gap-3">
      <span>EN</span>|<button class="cursor-pointer"><Earth></Earth></button>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { Earth } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'

const navbar = ref<HTMLElement | null>(null)

const navbarClasses = {
  'about-us': ['bg-zinc-900 border-b border-zinc-800 text-zinc-50'],
  home: [
    'bg-blue-50 border-b border-b-blue-100 text-black',
    'bg-zinc-50 border-b border-b-zinc-200 text-zinc-900',
    'bg-blue-50 border-b border-b-blue-100',
  ],
} as any

const route = useRoute()
// const routeName = ref(route.name!)

const level = ref(0)

function handleScroll() {
  const scrollY = window.scrollY
  // console.log('navbar', scrollY, window.innerHeight)
  if (window.innerHeight > scrollY + 70 && scrollY >= 0) {
    level.value = 0
  }
  if (window.innerHeight <= scrollY + 70) {
    level.value = 1
    // navbar.value?.classList.add('bg-black')
  }
}

onMounted(() => {
  console.log('Route', route.name)
  window.addEventListener('scroll', handleScroll)
})

const routes = [
  {
    pageName: 'Home',
    pageLabel: '',
    to: '/',
  },
  {
    pageName: 'About Us',
    pageLabel: '',
    to: '/about-us',
  },
  {
    pageName: 'Discover',
    pageLabel: '',
    to: '/',
  },
  {
    pageName: 'Booking',
    pageLabel: '',
    to: '/',
  },
  {
    pageName: 'Contact',
    pageLabel: '',
    to: '/',
  },
]
</script>
<style scoped></style>
