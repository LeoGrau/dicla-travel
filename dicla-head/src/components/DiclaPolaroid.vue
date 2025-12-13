<template>
  <div
    class="bg-white w-full min-h-[380px] min-w-[300px] max-w-[280px] shadow flex flex-col items-start transition-transform duration-300 hover:scale-110 cursor-pointer"
  >
    <div class="overflow-hidden p-4 w-full h-[300px]">
      <img class="w-full h-full object-cover" :src="props.imgUrl" alt="" />
    </div>
    <div class="flex justify-between items-center w-full px-4 gap-2">
      <div class="flex gap-3">
        <div class="flex items-center gap-1">
          <HeartIcon fill="red" stroke-width="1" color="red"></HeartIcon>
          <span class="text-xs inter-600">12.7K</span>
        </div>
        <div class="flex items-center gap-1">
          <MessageCircle></MessageCircle>
          <span class="text-xs inter-600">300</span>
        </div>
        <SendIcon></SendIcon>
      </div>
      <BookmarkIcon></BookmarkIcon>
    </div>
  </div>
</template>
<script setup lang="ts">
import { HeartIcon, SendIcon, MessageCircle, BookmarkIcon } from 'lucide-vue-next'

interface DiclaPolaroid {
  main?: boolean
  imgUrl?: string
}

const props = defineProps<DiclaPolaroid>()
</script>
<style lang=""></style>
