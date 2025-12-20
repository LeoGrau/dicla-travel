<template>
  <div
    @click="console.log('icon', props.icon)"
    :class="{
      'bg-neutral-200': !props.selected,
      'bg-neutral-800 text-neutral-200': props.selected,
    }"
    class="rounded-full text-xs px-3 py-2 cursor-pointer transition-colors flex items-center gap-1"
  >
    <i v-if="props.icon != undefined || props.icon != null" :class="props.icon"></i>
    <span>
      {{ props.object[props.property] }}
    </span>
  </div>
</template>
<script setup lang="ts">
import { onMounted } from 'vue'

interface DynamicChipProps {
  property: string
  object: any
  selected?: boolean
  icon?: string
}

const props = withDefaults(defineProps<DynamicChipProps>(), {
  selected: false,
})

onMounted(() => {
  console.log(props.object, props.selected, props.icon)
})
</script>
<style lang=""></style>
