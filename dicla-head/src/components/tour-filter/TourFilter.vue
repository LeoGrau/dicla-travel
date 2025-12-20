<template>
  <div
    class="bg-white w-[450px] p-5 flex flex-col gap-4 border-r border-r-zinc-200 rounded-r-lg h-[calc(100vh-70px)] overflow-y-scroll"
  >
    <div class="">
      <button
        @click="applyFilters()"
        class="flex items-center justify-center gap-1 transition-colors bg-indigo-500 hover:bg-indigo-700 cursor-pointer py-5 px-6 rounded-full text-indigo-50"
      >
        <Filter :size="16"></Filter>
        <span class="text-sm">Apply Filter</span>
      </button>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b w-full">
      <h3 class="inter-600 mb-2">Precio</h3>
      <div class="flex flex-col w-full gap-3">
        <DualSlider v-model:max-value="maxValue" v-model:min-value="minValue"></DualSlider>
      </div>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b">
      <h3 class="inter-600 mb-2">Category</h3>
      <DynamicChipGroup
        v-model:changed-items="selectedCategories"
        :multiple="true"
        :chips="categories"
        property="label"
      ></DynamicChipGroup>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b">
      <h3 class="inter-600 mb-2">Cities</h3>
      <DynamicChipGroup
        v-model:changed-items="selectedCity"
        :chips="cities"
        property="label"
      ></DynamicChipGroup>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b">
      <h3 class="inter-600 mb-2">Rating</h3>
      <div class="flex gap-2">
        <div class="flex gap-1">
          <DynamicChipGroup
            v-model:changed-items="selectedRating"
            :icon="'bi bi-star-fill text-yellow-400'"
            :chips="[{ rating: 1 }, { rating: 2 }, { rating: 3 }, { rating: 4 }, { rating: 5 }]"
            property="rating"
          ></DynamicChipGroup>
        </div>
      </div>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b">
      <h3 class="inter-600 mb-2">Publish Date</h3>
      <div class="flex flex-col gap-4 mt-2">
        <DateSelector></DateSelector>
        <DateSelector></DateSelector>
      </div>
    </div>
    <div class="flex flex-col border-b-neutral-200 p-5 border-b">
      <h3 class="inter-600">Duration</h3>
      <div class="flex flex-col gap-2 mt-2">
        <RadioButton
          v-for="(duration, index) in durations"
          :key="duration.label"
          :id="index.toString()"
          :name="'duration'"
          :label="duration.label"
        />
      </div>
    </div>
  </div>
</template>
<script lang="ts" setup>
import { ref, watch } from 'vue'
import DualSlider from '../inputs/DualSlider.vue'
import RadioButton from '../inputs/RadioButton.vue'

import { Filter } from 'lucide-vue-next'
import DateSelector from '../inputs/DateSelector.vue'
import DynamicChipGroup from '../inputs/DynamicChipGroup.vue'

const maxValue = ref(80)
const minValue = ref(20)

const selectedCategories = ref([])
const selectedCity = ref()

// Duration Options
const durations = [
  {
    label: 'Half day',
  },
  { label: 'Full day' },
  { label: '2-6 days' },
  { label: '1+ Week' },
]

// Categories
const categories = [
  { label: 'Cultural & Historical' },
  { label: 'Nature & Wildlife' },
  { label: 'Adventure' },
  { label: 'Multi-day Tours' },
  { label: 'Beach & Coastal' },
]

const selectedRating = ref()

const cities = [{ label: 'Cusco' }, { label: 'Lima' }, { label: 'Arequipa' }, { label: 'Iquitos' }]

function retrieve() {
  
}

watch(selectedCategories, (current) => {
  console.log('categories:', current)
})

watch(selectedCity, (current) => {
  console.log('city:', current)
})

function applyFilters() {
  console.log('Filters', {
    selectedCategory: selectedCategories.value,
    selectedCity: selectedCity.value,
  })
}
</script>
<style></style>
