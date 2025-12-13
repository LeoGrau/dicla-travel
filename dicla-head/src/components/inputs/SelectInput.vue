<template>
  <div class="select-input relative cursor-pointer">
    <div
      class="w-[100px] text-sm h-full rounded flex items-center pl-2 cursor-pointer transition-colors outline outline-zinc-300 hover:outline-indigo-700 hover:shadow-[0_0_0_0.3rem_var(--color-indigo-200)]"
      @click="optionsAreVisible = !optionsAreVisible"
    >
      {{ selectedOption }} items
    </div>
    <ul
      class="absolute text-sm border-zinc-200 overflow-hidden transition-[height] w-full overflow-y-scroll bg-white rounded"
      :class="{
        'h-0': !optionsAreVisible,
        'h-[100px] shadow-[0_0_2px_1px_var(--color-zinc-300)]': optionsAreVisible,
      }"
    >
      <li
        class="p-2 hover:bg-indigo-100 rounded m-1"
        @click="setItemsPerPage(nItems)"
        v-for="nItems in props.itemsPerPage"
        :key="nItems"
      >
        {{ nItems }}
      </li>
    </ul>
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue'

interface SelectInputProps {
  itemsPerPage?: number[]
}

const optionsAreVisible = ref(false)

const props = withDefaults(defineProps<SelectInputProps>(), {
  itemsPerPage: () => [5, 10, 15, 20],
})

function setItemsPerPage(nItems: number) {
  selectedOption.value = nItems
  optionsAreVisible.value = false
}

const selectedOption = defineModel({ default: 10 })
</script>
<style lang=""></style>
