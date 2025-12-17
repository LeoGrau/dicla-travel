<template>
  <div class="flex gap-2 items-center cursor-pointer">
    <input type="radio" :name="props.name" :id="props.id" />
    <label class="text-sm">{{ props.label }}</label>
  </div>
</template>
<script lang="ts" setup>
interface RadioButton {
  name?: string
  id: string
  label: string
}

const props = defineProps<RadioButton>()
</script>
<style scoped>
input[type='radio'] {
  cursor: pointer;
  appearance: none;
  border: 1px solid var(--color-neutral-200);
  border-radius: calc(infinity * 1px);
  background: white;
  width: 18px;
  height: 18px;
  position: relative;
}

input[type='radio']:hover {
  background-color: var(--color-indigo-100);
}

input[type='radio']:checked {

  background: var(--color-indigo-400);
  border-radius: calc(infinity * 1px);
}

input[type='radio']:checked::after {
  appearance: none;
  content: "";
  cursor: pointer;
  background: white;
  border-radius: calc(infinity * 1px);
  width: 8px;
  height: 8px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

</style>
