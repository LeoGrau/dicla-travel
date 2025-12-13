<template>
  <div
    class="h-[250px] shrink-0 grow-0 basis-[250px] image-test rounded overflow-hidden relative shadow"
  >
    <img class="h-full w-full object-cover" :src="props.urlImage" alt="" />
    <div class="absolute inset-0 glass"></div>
  </div>
</template>
<script lang="ts" setup>
import { type CarouselCardProps } from './carousel-card.interface.props'

const props = defineProps<CarouselCardProps>()
</script>
<style scoped></style>
