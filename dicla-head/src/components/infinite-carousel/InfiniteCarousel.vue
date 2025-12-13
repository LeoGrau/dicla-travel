<template>
  <div class="flex justify-center w-full">
    <div class="w-[90%] h-full overflow-hidden">
      <div class="flex whitespace-nowrap mask-fade-all h-full">
        <div
          :class="
            props.direction === 'left'
              ? 'animate-[slide-left_30s_linear_infinite]'
              : 'animate-[slide-right_30s_linear_infinite]'
          "
          class="flex gap-3 justify-center pr-3"
        >
          <CarouselCard
            :url-image="card.urlImage"
            v-for="(card, index) in carouselCards"
            :key="index"
          ></CarouselCard>
        </div>
        <div
          aria-hidden
          :class="
            props.direction === 'left'
              ? 'animate-[slide-left_30s_linear_infinite]'
              : 'animate-[slide-right_30s_linear_infinite]'
          "
          class="flex gap-3 justify-center pr-3"
        >
          <CarouselCard
            :url-image="card.urlImage"
            v-for="(card, index) in carouselCards"
            :key="index"
          ></CarouselCard>
        </div>
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
import type { CarouselCardProps } from './carousel-card.interface.props'
import CarouselCard from './CarouselCard.vue'

interface InfiniteCarouselProps {
  direction: 'left' | 'right'
  carouselCards: CarouselCardProps[]
}
const props = defineProps<InfiniteCarouselProps>()
</script>
<style scoped></style>
