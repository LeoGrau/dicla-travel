<template>
  <div
    @click="isClicked = !isClicked"
    :class="{ 'bg-neutral-200': !isClicked, 'bg-neutral-800 text-neutral-200': isClicked }"
    class="rounded-full text-xs px-3 py-2 cursor-pointer transition-colors"
  >
    {{ props.label }}
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'

interface DynamicChipProps {
  label: string
}

const props = defineProps<DynamicChipProps>()

const isClicked = ref(false)
</script>
<style lang=""></style>
