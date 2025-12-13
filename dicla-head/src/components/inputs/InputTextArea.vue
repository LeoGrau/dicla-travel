<template>
  <div class="rounded w-full cursor-pointer dicla-input-text">
    <textarea
      class="w-full bg-white"
      :placeholder="props.placeholder ?? 'Label'"
      v-model="inputValue"
      type="text"
    />
  </div>
</template>
<script setup lang="ts">
interface TextAreaProps {
  placeholder?: string
}

const inputValue = defineModel<string>({ required: true })

const props = defineProps<TextAreaProps>()
</script>
<style scoped>
::placeholder {
  font-size: var(--text-base);
  color: var(--color-neutral-300);
}

.shadow-custom {
  box-shadow: 0 0 3px 3px var(--color-neutral-200);
}

.dicla-input-text textarea {
  min-height: 200px;
  resize: none;
  font-size: var(--text-sm);
  border: 1px solid var(--color-neutral-300);
  padding: 14px 18px 14px 22px;
  border-radius: 1rem;
  transition:
    box-shadow 200ms ease,
    border 200ms ease;
}

.dicla-input-text:hover textarea {
  border: 1px solid var(--color-neutral-900);
  box-shadow: 0 0 0 0.2rem var(--color-gray-200);
}

.dicla-input-text:focus textarea {
  outline: none;
}

/* Focus: glow más evidente */
.dicla-input-text:focus textarea {
  border: 1px solid var(--color-neutral-900);
  box-shadow: 0 0 0 0.2rem var(--color-gray-200);
}
</style>
