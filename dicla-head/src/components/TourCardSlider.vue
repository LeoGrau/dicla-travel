<template>
  <div ref="sliderContainer" id="wuat" class="flex flex-col gap-2">
    <h1 class="inter-600 text-lg text-neutral-900">
      Los más <span class="inter-700 text-teal-500">populares</span>
    </h1>
    <div class="relative w-[1152px]">
      <div class="overflow-hidden w-full">
        <div
          class="flex justify-content-center items-ceter gap-4 transition-transform duration-200"
          :style="{ transform: `translateX(-${tourXScroll}px)` }"
        >
          <TourCard
            :tourCard="tour"
            :dark-component-mode="false"
            v-for="(tour, index) in tours"
            :key="index"
          ></TourCard>
        </div>
      </div>
      <div class="flex justify-between absolute top-[35%] w-[1152px]">
        <button
          @click="handleTourScroll('L')"
          class="rounded-full p-3 bg-white hover:bg-zinc-100 cursor-pointer shadow -translate-x-4"
        >
          <ArrowLeft></ArrowLeft>
        </button>
        <button
          @click="handleTourScroll('R')"
          class="rounded-full p-3 bg-white hover:bg-zinc-100 cursor-pointer shadow translate-x-4"
        >
          <ArrowRight></ArrowRight>
        </button>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { ArrowRight, ArrowLeft } from 'lucide-vue-next'
import TourCard from './TourCard.vue'
import type { TourCardType } from '@/types/tours/tour.interface'

interface TourCardSlider {
  tours?: TourCardType[]
}

const props = defineProps<TourCardSlider>()

import { computed, onMounted, ref } from 'vue'

const sliderContainer = ref<HTMLElement | null>(null)
const sliderWidth = ref(0)

/**
 *
 */

const tourXScroll = ref(0)
function handleTourScroll(orientation: string) {
  const jumpOrientation = orientation == 'L' ? -sliderWidth.value : +sliderWidth.value
  console.log('here i am', tourXScroll.value)
  const isOnMovementRange =
    tourXScroll.value + jumpOrientation < maxJumps.value * sliderWidth.value &&
    tourXScroll.value + jumpOrientation >= 0
  // Movement Range
  if (isOnMovementRange) tourXScroll.value += jumpOrientation
  console.log('here i am x2', tourXScroll.value)
}

const maxJumps = computed(() => {
  const MAX_ITEMS = 4
  return props.tours!.length / MAX_ITEMS
})

onMounted(() => {
  // SliderContainer is mounted and exists.
  if (sliderContainer.value) {
    sliderWidth.value = sliderContainer.value.offsetWidth
    console.log('chambi master', sliderWidth.value)
  }
})
</script>
<style lang=""></style>
