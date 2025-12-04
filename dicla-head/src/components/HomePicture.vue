<template>
  <div class="rounded-xl overflow-hidden h-full w-[250px] max-h-80 shadow-black shadow-xs">
    <img class="object-cover h-full w-full" :src="props.urlPhoto" alt="" />
  </div>
</template>
<script setup lang="ts">
interface HomePictureProps {
  urlPhoto: string
}

const props = defineProps<HomePictureProps>()
</script>
<style scoped></style>
