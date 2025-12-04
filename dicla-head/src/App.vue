<template>
  <div class="flex flex-col">
    <DiclaNavbar />
    <div class="mt-[70px]">
      <RouterView />
    </div>
    <DiclaFooter></DiclaFooter>
  </div>
</template>
<script setup lang="ts">
import DiclaNavbar from '@/components/DiclaNavbar.vue'
import { RouterView } from 'vue-router'
import DiclaFooter from './components/DiclaFooter.vue'
</script>
<style></style>
