<template>
  <div class="flex flex-wrap gap-x-1 gap-y-1 mt-1">
    <DynamicChip
      @click="selectChip(chip, index)"
      :object="chip"
      :selected="isSelected(index)"
      :property="props.property"
      :icon="props.icon"
      v-for="(chip, index) in props.chips"
      :key="index"
    ></DynamicChip>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'
import DynamicChip from './DynamicChip.vue'

const emits = defineEmits(['update:changedItems'])

interface DynamicChipGroup {
  chips: any[]
  property: string
  multiple?: boolean
  icon?: string
}

const changedItems = ref<{ chip: any; index: number } | { chip: any; index: number }[]>()

const selectedChip = ref<{ chip: any; index: number }>()
const selectedChips = ref<Map<number, { chip: any; index: number }>>(
  new Map<number, { chip: any; index: number }>(),
)

function selectChip(chip: any, index: number) {
  chip.selected = !chip.selected
  if (props.multiple!) {
    if (selectedChips.value.has(index)) {
      selectedChips.value.delete(index)
    } else {
      selectedChips.value.set(index, { chip, index })
    }
    changedItems.value = [...selectedChips.value.values()]
  } else {
    selectedChip.value = { chip, index }
    changedItems.value = selectedChip.value
  }
  emits('update:changedItems', changedItems.value)
}

const props = withDefaults(defineProps<DynamicChipGroup>(), {
  multiple: false,
  property: 'label',
})

function isSelected(index: number) {
  console.log(
    index,
    (props.multiple && selectedChips.value.has(index)) ||
      (!props.multiple && selectedChip.value?.index == index),
  )
  return (
    (props.multiple && selectedChips.value.has(index)) ||
    (!props.multiple && selectedChip.value?.index == index)
  )
}
</script>
<style scoped></style>
