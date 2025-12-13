<template>
  <div
    class="bg-white hover:scale-[1.02] shadow rounded-lg w-full overflow-hidden flex flex-col cursor-pointer transition-transform"
  >
    <div class="w-full relative">
     <div class="w-full overflow-hidden relative">
       <button

      @click="wished = !wished"
        class="absolute right-3 top-3 bg-white flex justify-center rounded-full p-2 items-center cursor-pointer transition-shadow hover:shadow-[0_0_0_4px_var(--color-red-200)]"
      >
        <Heart :size="20" :fill="wished? 'var(--color-red-500)': 'transparent'" :color="wished? '': 'var(--color-zinc-700)'"></Heart>
      </button>
      <img
        class="w-full"
        src="http://192.168.1.58/wp-content/uploads/2025/12/huascaran-scaled.jpg"
        alt=""
      />
     </div>
      <div class="flex items-center absolute bottom-0 right-2.5 translate-y-[50%]">
        <button
          class="cursor-pointer bg-teal-400 text-white w-10 h-10 flex items-center justify-center rounded-full hover:shadow-[0_0_0_4px_var(--color-teal-100)] transition-shadow"
        >
          <i class="bi bi-cart-plus"></i>
        </button>
      </div>
    </div>
    <div class="info p-4 flex flex-col gap-2 mt-3">
      <div class="flex justify-between items-center">
        <div class="text-xs rounded-full px-3 py-1 bg-zinc-200 w-fit">
          {{ 'Lima' }}
        </div>
        <div class="flex items-center gap-1">
          <StarIcon
            class="cursor-pointer"
            :size="22"
            :color="'transparent'"
            :fill="'oklch(87.9% 0.169 91.605)'"
          >
          </StarIcon>
          <span class="text-xs text-neutral-800 inter-500 h-fit">4.5</span>
        </div>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <h1 class="inter-600">Nevado Huascara Super Tour</h1>
      </div>
      <div class="flex gap-1 items-center">
        <span class="inter-500 text-sm">Precio</span>
        <span class="inter-500 text-indigo-500">{{ '20.20' }}$</span>
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue'

import { StarIcon, Heart } from 'lucide-vue-next'

const wished = ref(false)

</script>
<style lang=""></style>
