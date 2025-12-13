<template>
  <div class="w-full cursor-pointer dicla-input-text">
    <input
      class="w-full bg-white poppins-regular"
      :placeholder="props.placeholder ?? 'Label'"
      v-model="inputValue"
      type="text"
    />
  </div>
</template>
<script lang="ts" setup>
interface InputTextProps {
  placeholder?: string
  icon?: string
}

const props = defineProps<InputTextProps>()

const inputValue = defineModel({ required: true })
</script>
<style scoped>
::placeholder {
  font-size: var(--text-base);
  color: var(--color-neutral-300);
}

.shadow-custom {
  box-shadow: 0 0 3px 3px var(--color-neutral-200);
}

.dicla-input-text {
  position: relative;
}

.dicla-input-text input {
  font-size: var(--text-base);
  border: 1px solid var(--color-neutral-300);
  padding: 14px 18px 14px 22px;
  border-radius: calc(infinity * 1px);
  transition:
    box-shadow 200ms ease,
    border 200ms ease;
}

.dicla-input-text:hover input {
  border: 1px solid var(--color-neutral-900);
  box-shadow: 0 0 0 0.2rem var(--color-gray-200);
}

.dicla-input-text input:focus {
  outline: none;
}

/* Focus: glow más evidente */
.dicla-input-text input:focus {
  border: 1px solid var(--color-neutral-900);
  box-shadow: 0 0 0 0.2rem var(--color-gray-200);
}
</style>
