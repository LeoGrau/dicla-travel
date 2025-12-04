<template>
  <div class="flex flex-col gap-2 w-[272px] h-[380px] justify-start">
    <div
      class="min-w-[272px] min-h-[272px] w-[272px] h-[272px] rounded-md cursor-pointer overflow-hidden relative"
    >
      <button
        class="absolute top-2 right-2 bg-white hover:bg-zinc-100 p-2 rounded-full cursor-pointer"
      >
        <Info></Info>
      </button>
      <button class="absolute top-0"></button>
      <button class="absolute top-0"></button>
      <img class="w-full h-full object-cover" :src="`${props.tourCard.url_image}`" alt="" />
    </div>
    <div class="flex flex-col justify-between h-full">
      <div>
        <div
          class="text-xs rounded-full px-3 py-1 bg-zinc-200 w-fit"
          :class="{ 'text-neutral-200': darkComponentMode }"
        >
          {{ props.tourCard.city_name }}
        </div>
        <span class="inter-600" :class="{ 'text-neutral-200': darkComponentMode }">{{
          props.tourCard.title?.length! > 30
            ? `${props.tourCard.title?.slice(0, 27)}...`
            : `${props.tourCard.title}`
        }}</span>
        <div class="flex items-center gap-2">
          <span class="text-xs text-blue-800">{{ props.tourCard.ranking }}</span>
          <div class="flex items-center">
            <Star
              v-for="index in stars.filledStars"
              :key="index"
              fill="oklch(87.9% 0.169 91.605)"
              stroke-width="0"
            ></Star>
            <StarHalf
              v-for="index in stars.halfStars"
              :key="index"
              fill="oklch(87.9% 0.169 91.605)"
              stroke-width="0"
            ></StarHalf>
          </div>
        </div>
      </div>
      <div>
        <span class="inter-600 text-sm mr-1" :class="{ 'text-neutral-200': darkComponentMode }"
          >Price</span
        >
        <span class="text-indigo-600">${{ props.tourCard.price_usd }}</span>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import type { TourCardType } from '@/types/tours/tour.interface'
import { Star, StarHalf, Info } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'

interface TourCardProps {
  darkComponentMode: boolean
  tourCard: TourCardType
}

const props = defineProps<TourCardProps>()

const stars = ref<{ halfStars: number; filledStars: number }>({ halfStars: 0, filledStars: 0 })

function getStars(totalStars: number) {
  console.log('stars', stars.value)
  const filled = Math.floor(totalStars)
  const decimal = totalStars - filled
  console.log(filled, decimal)
  return {
    filledStars: filled,
    halfStars: decimal >= 0.5 ? 1 : 0,
  }
}

onMounted(() => {
  console.log('tourCard', props.tourCard, getStars(props.tourCard.ranking!))
  if (props.tourCard) {
    stars.value = getStars(props.tourCard.ranking!)
  }
})
</script>
<style lang=""></style>
