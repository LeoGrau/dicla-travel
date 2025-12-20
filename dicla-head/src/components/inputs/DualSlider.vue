<template>
  <div class="flex w-full gap-3 z-20 relative">
    <div class="flex flex-col justify-center w-1/2">
      <label class="text-sm" for="">Min</label>
      <input
        @input="handleInput()"
        v-model.number="minValue"
        placeholder="Min"
        class="w-full border rounded-full border-gray-300 p-2 text-sm"
        type="number"
      />
    </div>
    <div class="flex flex-col justify-center w-1/2">
      <label class="text-sm" for="">Max</label>
      <input
        @input="handleInput()"
        v-model.number="maxValue"
        placeholder="Max"
        class="w-full border rounded-full border-gray-300 p-2 text-sm"
        type="number"
      />
    </div>
  </div>
  <div class="relative w-full h-[30px] flex items-center">
    <input
      ref="maxInput"
      @input="handleInput()"
      type="range"
      v-model.number="maxValue"
      class="slider absolute w-full bg-transparent! z-40 text-xs cursor-grab"
    />
    <input
      ref="minInput"
      @input="handleInput()"
      type="range"
      v-model.number="minValue"
      class="slider absolute w-full z-30 cursor-grab"
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
  width: 25px;
  height: 25px;
  border-radius: 50%;
  border: 1px solid var(--color-zinc-400);
  box-shadow: 0px 2px 0.6em 1px rgba(44, 44, 44, 20%);
}
</style>
