<template>
  <div class="dicla-input flex w-full">
    <div class="dicla-select-container relative h-full w-1/3 cursor-pointer max-w-[120px]">
      <div
        @focusout="showOptions = false"
        @click="showOptions = !showOptions"
        class="appearance-none dicla-select h-full bg-blue-50 text-sm flex gap-2 items-center"
      >
        <img
          src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png"
          :class="`flag flag-${selectedOption?.countryCode.toLocaleLowerCase()}`"
        />
        <div class="flex gap-1">
          <span class="montserrat-600">{{ selectedOption?.countryCode }}</span>
          <span class="montserrat-600">{{ selectedOption?.codeNumber }}</span>
        </div>
      </div>
      <ul
        class="options overflow-y-scroll absolute rounded z-50 bg-white w-full overflow-hidden border-neutral-300"
        :class="{ 'h-0 border-0': !showOptions, 'h-32 border': showOptions }"
      >
        <li
          @click="selectOption(option)"
          class="p-2 text-sm hover:bg-indigo-300 flex gap-2 items-center"
          v-for="(option, index) in options"
          :key="index"
        >
          <img
            src="https://primefaces.org/cdn/primevue/images/flag/flag_placeholder.png"
            :class="`flag flag-${option?.countryCode.toLocaleLowerCase()}`"
            alt=""
          />
          <div class="flex gap-1">
            <span class="montserrat-600">{{ option?.countryCode }}</span>
            <span class="montserrat-600">{{ option?.codeNumber }}</span>
          </div>
        </li>
      </ul>
    </div>
    <input
      @keydown="onlyNumbers($event)"
      :placeholder="props.placeholder"
      class="w-2/3 max-w-full flex-1"
      type="tel"
    />
  </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from 'vue'

interface InputPhoneNumber {
  placeholder?: string
}

const props = withDefaults(defineProps<InputPhoneNumber>(), {
  placeholder: 'Label',
})

function onlyNumbers(e: KeyboardEvent) {
  const onlyNumbersRegex = /^[0-9]$/g
  const exceptions = ['Enter', 'ArrowRight', 'ArrowLeft', 'ArrowUp', 'ArrowDown', 'Backspace']
  console.log(e.key)
  // Not numbers and not exceptions. Here goes what prevents natural behavior
  if (!onlyNumbersRegex.test(e.key) && !exceptions.includes(e.key)) {
    e.preventDefault()
  }
}

const options = ref([
  { id: 1, countryCode: 'PE', codeNumber: '+51' }, // Perú
  { id: 2, countryCode: 'US', codeNumber: '+1' }, // Estados Unidos
  { id: 3, countryCode: 'BR', codeNumber: '+55' }, // Brasil
  { id: 4, countryCode: 'CO', codeNumber: '+57' }, // Colombia
  { id: 5, countryCode: 'MX', codeNumber: '+52' }, // México
  { id: 6, countryCode: 'AR', codeNumber: '+54' }, // Argentina
  { id: 7, countryCode: 'CL', codeNumber: '+56' }, // Chile
  { id: 8, countryCode: 'EC', codeNumber: '+593' }, // Ecuador
  { id: 9, countryCode: 'UY', codeNumber: '+598' }, // Uruguay
  { id: 10, countryCode: 'VE', codeNumber: '+58' }, // Venezuela
])

const selectedOption = ref<{ id: number; countryCode: string; codeNumber: string }>()

function selectOption(option: { id: number; countryCode: string; codeNumber: string }) {
  selectedOption.value = option
  showOptions.value = false
}

const showOptions = ref(false)

onMounted(() => {
  selectedOption.value = options.value[0]
})
</script>
<style scoped>
.dicla-input input::placeholder {
  font-size: var(--text-base);
  color: var(--color-neutral-300);
}

.dicla-input {
  position: relative;
  height: 100%;
}

.dicla-input input {
  border: solid var(--color-neutral-300);
  border-width: 1px 1px 1px 1px;
  padding: 14px 18px 14px 22px;
  border-radius: 0 calc(infinity * 1px) calc(infinity * 1px) 0;
}
.dicla-input .dicla-select {
  border: solid var(--color-neutral-300);
  padding: 14px 18px 14px 22px;
  border-radius: calc(infinity * 1px) 0 0 calc(infinity * 1px);
  border-width: 1px 0 1px 1px;
}
</style>
d
