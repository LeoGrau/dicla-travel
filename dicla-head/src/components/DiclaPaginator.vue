<template>
  <div class="flex gap-2 w-fit">
    <div class="flex gap-3">
      <button
        @click="currentPage = 1"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronsLeft color="var(--color-zinc-400)" />
      </button>
      <button
        @click="currentPage = currentPage - 1 <= 0 ? 1 : currentPage - 1"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronLeft color="var(--color-zinc-400)" />
      </button>
      <button
        v-for="index in setVisiblePages(currentPage)"
        @click="currentPage = index"
        :key="index"
        :class="{
          'bg-indigo-400 text-indigo-50': index === currentPage,
          'hover:bg-indigo-100': index !== currentPage,
        }"
        class="rounded-full h-10 w-10 flex justify-center items-center cursor-pointer transition-colors"
      >
        {{ index }}
      </button>
      <button
        @click="currentPage = currentPage + 1 > pages ? pages : currentPage + 1"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronRight color="var(--color-zinc-400)" />
      </button>
      <button
        @click="currentPage = pages"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronsRight color="var(--color-zinc-400)" />
      </button>
    </div>
    <SelectInput></SelectInput>
  </div>
</template>
<script setup lang="ts">
import { ChevronLeft, ChevronsLeft, ChevronRight, ChevronsRight } from 'lucide-vue-next'
import { onMounted, ref } from 'vue'
import SelectInput from './inputs/SelectInput.vue'

const pages = ref(16)
const currentPage = ref(1)

function setVisiblePages(selectedItem: number) {
  if (selectedItem <= 0) throw new Error('Fuck')
  if (Math.round(5 / 2) >= selectedItem) return Array.from({ length: 5 }, (_, index) => index + 1)
  if (selectedItem + Math.floor(5 / 2) > pages.value)
    return Array.from({ length: 5 }, (_, index) => pages.value - index).reverse()

  // Equivalent [selectedItem - 2, selectedItem - 1, selectedItem, selectedItem + 1, selectedItem + 2]
  const generatedArray = Array.from({ length: 5 }, (_, index) => {
    return selectedItem - 2 + index
  })
  return generatedArray
}

onMounted(() => {
  console.log('Weit: ', setVisiblePages(1))
})
</script>

<style lang=""></style>
