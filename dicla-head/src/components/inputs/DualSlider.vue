<template>
  <div class="flex w-full gap-3">
    <div class="flex flex-col justify-center w-1/2">
      <label class="text-sm" for="">Min</label>
      <input
        @input="handleInput()"
        v-model="minValue"
        min="0"
        placeholder="Min"
        class="w-full border rounded-full border-gray-300 p-2 text-sm"
        type="number"
      />
    </div>
    <div class="flex flex-col justify-center w-1/2">
      <label class="text-sm" for="">Max</label>
      <input
        @input="handleInput()"
        :min="1"
        v-model="maxValue"
        placeholder="Max"
        class="w-full border rounded-full border-gray-300 p-2 text-sm"
        type="number"
      />
    </div>
  </div>
  <div class="relative w-full">
    <input
      ref="maxInput"
      @input="handleInput()"
      value="80"
      min="1"
      max="100"
      type="range"
      v-model="maxValue"
      class="slider absolute w-full bg-transparent! z-50 text-xs cursor-grab"
    />
    <input
      ref="minInput"
      @input="handleInput()"
      value="20"
      min="0"
      max="100"
      type="range"
      v-model="minValue"
      class="slider absolute w-full z-40 cursor-grab"
    />
  </div>
</template>
<script lang="ts" setup>
import { onMounted, ref } from 'vue'

const maxInput = ref<HTMLElement>()
const minInput = ref<HTMLElement>()

const max_limit = ref(100)
// const min_limit = ref(0)

const maxValue = defineModel<number>('maxValue', { required: true, default: 80 })
const minValue = defineModel<number>('minValue', { required: true, default: 20 })

function handleInput() {
  let min = Number(minValue.value)
  const max = Number(maxValue.value)

  if (maxValue.value.toString() == '') {
    console.log(maxValue.value)
    maxValue.value = 2
    return
  }
  if (minValue.value.toString() == '') {
    minValue.value = 0
    return
  }

  if (min >= max) {
    min = max - 1
    minValue.value = min
  }

  const maxPercent = (maxValue.value * 100) / max_limit.value
  const minPercent = (minValue.value * 100) / max_limit.value
  console.log(maxPercent, minPercent)
  if (minInput.value) {
    minInput.value.style.background = `linear-gradient(
    to right,
    var(--color-indigo-100) ${minPercent}%,
    var(--color-indigo-950) ${minPercent}%,
    var(--color-indigo-950) ${maxPercent}%,
    var(--color-indigo-100) ${maxPercent}%
  )`
    // minInput.value.style.backgroundColor = 'red'
  }
}

onMounted(() => {
  handleInput()
})
</script>
<style scoped>
input[type='range'] {
  appearance: none;
  -webkit-appearance: none;
  /* background-color: var(--color-zinc-500); */
  height: 8px;
  border-radius: calc(infinity * 1px);
  pointer-events: none;
}

input[type='range']::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  background: linear-gradient(
    to right,
    var(--color-zinc-50) 30%,
    var(--color-zinc-100) 70%,
    var(--color-zinc-200) 100%
  );
  pointer-events: auto;
  width: 17px;
  height: 17px;
  border-radius: 50%;
  border: 1px solid var(--color-zinc-400);
}
</style>
