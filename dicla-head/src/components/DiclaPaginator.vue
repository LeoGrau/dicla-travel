<template>
  <div class="flex gap-2 w-fit">
    <div class="flex gap-3">
      <button
        @click="setToFirstPage()"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronsLeft color="var(--color-zinc-400)" />
      </button>
      <button
        @click="prevPage()"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronLeft color="var(--color-zinc-400)" />
      </button>
      <button
        v-for="index in setVisiblePages(currentPage)"
        @click="setToIndex(index)"
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
        @click="nextPage()"
        class="hover:bg-gray-200 transition-colors h-10 w-10 flex justify-center items-center rounded-full cursor-pointer"
      >
        <ChevronRight color="var(--color-zinc-400)" />
      </button>
      <button
        @click="setToLastPage()"
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
import { computed, onMounted, ref } from 'vue'
import SelectInput from './inputs/SelectInput.vue'

const pageSize = ref(10)

interface DiclaPaginatorProps {
  total: number
  currentPage: number
}

const props = withDefaults(defineProps<DiclaPaginatorProps>(), {
  total: 41,
  currentPage: 1,
})

// const currentPage = ref(1)
const emits = defineEmits(['update:currentPage'])
const _currentPage = ref(props.currentPage)

function nextPage() {
  _currentPage.value = _currentPage.value + 1 > pages.value ? pages.value : _currentPage.value + 1
  emits('update:currentPage', _currentPage.value)
}

function prevPage() {
  _currentPage.value = _currentPage.value - 1 <= 0 ? 1 : _currentPage.value - 1
  emits('update:currentPage', _currentPage.value)
}

function setToLastPage() {
  _currentPage.value = pages.value
  emits('update:currentPage', _currentPage.value)
}

function setToFirstPage() {
  _currentPage.value = 1
  emits('update:currentPage', _currentPage.value)
}

function setToIndex(index: number) {
  _currentPage.value = index
  emits('update:currentPage', _currentPage.value)
}

function setVisiblePages(selectedItem: number) {
  if (selectedItem <= 0) throw new Error('Fuck')
  const pagesPerSlide = Math.ceil(pages.value < 5 ? pages.value : 5)
  console.log('Selected Item', selectedItem, pages.value, props.total, props.total / pageSize.value)

  // Initial slide
  if (Math.ceil(pagesPerSlide / 2) >= selectedItem)
    return Array.from({ length: pagesPerSlide }, (_, index) => index + 1)

  // Final slide
  if (selectedItem + Math.floor(5 / 2) > pages.value)
    return Array.from({ length: pagesPerSlide }, (_, index) => pages.value - index).reverse()

  // Middle slides
  // Equivalent [selectedItem - 2, selectedItem - 1, selectedItem, selectedItem + 1, selectedItem + 2]
  const generatedArray = Array.from({ length: 5 }, (_, index) => {
    return selectedItem - 2 + index
  })
  return generatedArray
}

const pages = computed(() => Math.ceil(props.total / pageSize.value))

onMounted(() => {
  console.log(pages.value)
})
</script>

<style lang=""></style>
