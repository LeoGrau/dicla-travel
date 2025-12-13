<template>
  <div class="flex flex-col w-full h-full">
    <DiclaNavbar :background-color="navbarBackgroundColor" :color="color" />
    <div ref="viewContainer" :class="{ 'mt-[70px]': route.name !== 'contact' }" class="">
      <RouterView
        @top-section-bg-changed="
          (event: any) => {
            console.log('Yeah event', event)
            navbarBackgroundColor = event.backgroundColor
            color = event.color
          }
        "
      />
    </div>
    <DiclaFooter></DiclaFooter>
  </div>
</template>
<script setup lang="ts">
import DiclaNavbar from '@/components/DiclaNavbar.vue'
import { RouterView } from 'vue-router'
import DiclaFooter from './components/DiclaFooter.vue'
import { onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const navbarBackgroundColor = ref('bg-white')
const color = ref('blue')

onMounted(() => {})
</script>
<style></style>
