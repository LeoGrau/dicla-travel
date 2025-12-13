<template>
  <div class="bg-neutral-50 w-[400px] p-5 flex flex-col gap-10">
    <div class="flex flex-col">
      <h3 class="inter-600 mb-2">Precio</h3>
      <div class="flex flex-col w-full gap-3">
        <DualSlider v-model:max-value="maxValue" v-model:min-value="minValue"></DualSlider>
      </div>
    </div>
    <div class="flex flex-col">
      <h3 class="inter-600 mb-2">Rating</h3>
      <div class="flex gap-2">
        <div class="flex gap-2">
          <StarIcon
            @click="stars = index"
            v-for="index in 5"
            class="cursor-pointer"
            :size="20"
            :key="index"
            :color="index < stars ? 'oklch(87.9% 0.169 91.605)' : 'oklch(87.9% 0.169 91.605)'"
            :fill="index > stars ? 'transparent' : 'oklch(87.9% 0.169 91.605)'"
          ></StarIcon>
        </div>
        <span class="text-sm"
          >At least <span class="text-blue-600">{{ stars }}</span></span
        >
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { ref } from 'vue'
import DualSlider from '../inputs/DualSlider.vue'
import { StarIcon } from 'lucide-vue-next'

const stars = ref(5)

const maxValue = ref(80)
const minValue = ref(20)
</script>
<style></style>
