<template>
  <div
    ref="navbar"
    :class="`${props.backgroundColor} border-b ${restColors[props.color!]}`"
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

interface NavbarProps {
  color?: string
  backgroundColor?: string
}

const restColors = {
  linear: 'text-white border-b-zinc-200/30 backdrop-blur-xl',
  zinc: 'border-b-zinc-200/30 text-white',
  indigo: 'border-b-indigo-200/30 text-zinc-800',
  neutral: 'border-b-neutral-200 text-zinc-900',
  blue: 'border-b-blue-100',
  red: 'border-b-red-300',
  green: 'border-b-green-300',
  yellow: 'border-b-yellow-300',
} as { [key: string]: any }

const props = defineProps<NavbarProps>()

const navbar = ref<HTMLElement | null>(null)

const route = useRoute()
// const routeName = ref(route.name!)

onMounted(() => {
  console.log('Route', route.name, props.color)
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
    pageLabel: 'discover',
    to: '/discover',
  },
  {
    pageName: 'Contact',
    pageLabel: 'contact',
    to: '/contact',
  },
]
</script>
<style scoped></style>
