<template>
  <div
    class="bg-white shadow-lg rounded-lg w-full overflow-hidden flex flex-col cursor-pointer hover:scale-105 transition-transform"
  >
    <div class="w-full overflow-hidden">
      <img
        class="w-full"
        src="http://192.168.1.58/wp-content/uploads/2025/12/huascaran-scaled.jpg"
        alt=""
      />
    </div>
    <div class="info p-4 flex flex-col gap-2">
      <h1 class="inter-600">Nevado Huascara Super Tour</h1>
      <div class="text-xs rounded-full px-3 py-1 bg-zinc-200 w-fit">
        {{ 'Lima' }}
      </div>
      <div class="flex items-center gap-2">
        <span class="text-xs text-blue-600 inline-block">4.5</span>
        <div class="flex gap-1">
          <StarIcon
            @click="stars = index"
            v-for="index in 5"
            class="cursor-pointer"
            :size="22"
            :key="index"
            :color="index <= stars ? '' : 'oklch(87.9% 0.169 91.605)'"
            :fill="index > stars ? 'transparent' : 'oklch(87.9% 0.169 91.605)'"
          ></StarIcon>
        </div>
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue'

import { StarIcon } from 'lucide-vue-next'

const stars = ref(3)
</script>
<style lang=""></style>
