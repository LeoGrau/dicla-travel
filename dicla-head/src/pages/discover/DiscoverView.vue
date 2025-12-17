<template>
  <div ref="firstSectionRef" class="h-fit relative">
    <section class="bg-neutral-50 flex h-[calc(100dvh-70px)] w-full">
      <TourFilter></TourFilter>
      <div class="w-full flex flex-col">
        <div class="w-full p-4 flex flex-col items-center max-w-[1300px] overflow-y-scroll">
          <div class="flex flex-col">
            <SearchInput class="self-end mb-4"></SearchInput>
            <div
              class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5"
            >
              <TourDiscoverCard v-for="index in 10" :key="index"></TourDiscoverCard>
            </div>
          </div>
        </div>
        <div class="flex justify-center items-center bg-white p-3">
          <DiclaPaginator></DiclaPaginator>
        </div>
      </div>
    </section>
  </div>
</template>
<script setup lang="ts">
import { useSectionBackground } from '@/composables/useSectionBackground'
import { onMounted, ref } from 'vue'
import TourFilter from '@/components/tour-filter/TourFilter.vue'
import TourDiscoverCard from '@/components/cards/TourDiscoverCard.vue'
import SearchInput from '@/components/inputs/SearchInput.vue'
import DiclaPaginator from '@/components/DiclaPaginator.vue'

const emits = defineEmits(['top-section-bg-changed'])
const firstSectionRef = ref<HTMLElement | null>(null)

function onSectionBackgroundChange(data: { color: string; backgroundColor: string } | any) {
  emits('top-section-bg-changed', data)
}

const { observeItemsFromWrapper } = useSectionBackground({
  onSectionBackgroundChange,
})

onMounted(() => {
  observeItemsFromWrapper(firstSectionRef.value!)
})
</script>
<style lang=""></style>
