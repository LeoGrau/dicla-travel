<template>
  <div ref="firstSectionRef" class="h-fit relative">
    <section class="bg-neutral-50 flex h-[calc(100dvh-70px)] w-full">
      <TourFilter></TourFilter>
      <div class="w-full flex flex-col justify-between items-center">
        <div class="w-full p-4 flex flex-col items-center overflow-y-scroll">
          <div class="flex flex-col">
            <SearchInput class="self-end mb-4"></SearchInput>
            <div
              class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-5 max-w-[1300px]"
            >
              <TourDiscoverCard
                :tour
                v-for="(tour, index) in pagedRes?.items"
                :key="index"
              ></TourDiscoverCard>
            </div>
          </div>
        </div>
        <div class="flex justify-center items-center bg-white p-3 w-full">
          <DiclaPaginator
            v-model:current-page="query.page_index!"
            :total="pagedRes?.pagination.total!"
          ></DiclaPaginator>
        </div>
      </div>
    </section>
  </div>
</template>
<script setup lang="ts">
import { useSectionBackground } from '@/composables/useSectionBackground'
import { onMounted, reactive, ref, watch } from 'vue'
import TourFilter from '@/components/tour-filter/TourFilter.vue'
import TourDiscoverCard from '@/components/cards/TourDiscoverCard.vue'
import SearchInput from '@/components/inputs/SearchInput.vue'
import DiclaPaginator from '@/components/DiclaPaginator.vue'
import tourServiceRest, { type TourPageQuery } from '@/services/tour.service.rest'
import { type TourModel } from '@/types/models/tour.model.interface'
import type { BasePagedResponse } from '@/types/responses/base-paged.response.interface'

const emits = defineEmits(['top-section-bg-changed'])
const firstSectionRef = ref<HTMLElement | null>(null)

const pagedRes = ref<BasePagedResponse<TourModel>>()
const query = reactive<TourPageQuery>({ page_index: 1, page_size: 10 })

function onSectionBackgroundChange(data: { color: string; backgroundColor: string } | any) {
  emits('top-section-bg-changed', data)
}

const { observeItemsFromWrapper } = useSectionBackground({
  onSectionBackgroundChange,
})

async function getToursPageQuery() {
  const response = await tourServiceRest.getToursPageQuery(query)
  console.log(response)
  pagedRes.value = response.data
  console.log(pagedRes.value.items)
}

const start = async () => {
  getToursPageQuery()
}

onMounted(() => {
  observeItemsFromWrapper(firstSectionRef.value!)
  start()
})

// Checking query
watch(query, () => {
  console.log(query)
  getToursPageQuery()
})
</script>
<style lang=""></style>
