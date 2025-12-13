<template>
  <div class="w-full relative">
    <div class="w-fit h-full flex items-center z-10 absolute left-0 pl-5">
      <MailIcon color="oklch(87.2% 0.01 258.338)"></MailIcon>
    </div>
    <div class="customize">
      <slot></slot>
    </div>
  </div>
</template>
<script setup lang="ts">
import { MailIcon,  } from 'lucide-vue-next'
</script>
<style scoped>
/* .customize ::placeholder {
  padding: 2em;
} */

.customize :deep(input) {
  padding-left: 55px;
}
</style>
