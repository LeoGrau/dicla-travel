<template>
  <div class="search-input relative cursor-pointer">
    <Search
      class="absolute translate-y-[calc(50%+5px)] left-3 z-50"
      :size="18"
      color="#9f9fa9"
    ></Search>
    <input class="rounded-full p-3 bg-white relative text-sm" placeholder="Search" type="text" />
  </div>
</template>
<script setup lang="ts">
import { Search } from 'lucide-vue-next'
</script>
<style scoped>
.search-input input {
  padding-left: 2.2rem;
  outline-width: 2px;
  outline-offset: 0;
  outline-style: solid;
  outline-color: var(--color-neutral-300);
  transition:
    border 200ms ease-in,
    box-shadow 200ms ease-in,
    outline-color 200ms ease-in;
}

.search-input input::placeholder {
  color: var(--color-zinc-400);
}

.search-input input:hover {
  outline-color: var(--color-indigo-500);
  box-shadow: 0 0 0 0.3rem var(--color-indigo-300);
}

.search-input input:focus {
  outline-color: var(--color-indigo-500);
  box-shadow: 0 0 0 0.3rem var(--color-indigo-300);
}
</style>
