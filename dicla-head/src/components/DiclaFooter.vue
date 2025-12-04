<template>
  <div class="text-neutral-100 h-[60vh] flex justify-center relative">
    <div class="w-full h-[60vh] absolute overflow-hidden">
      <img
        class="w-full object-cover h-full"
        src="https://jadetoursperu.com/wp-content/uploads/2020/07/56457aef8086fdaf49b67c92fdaad979.jpg"
        alt=""
      />
    </div>
    <div class="bg-neutral-600/60 w-full h-full absolute z-10"></div>
    <div
      class="grid grid-cols-3 justify-center justify-items-center center items-center w-6xl relative z-40"
    >
      <div class="flex justify-center items-start h-[200px] p-6">
        <div class="flex flex-col min-w-[346px] w-[90%]">
          <h1 class="text-lg montserrat-600 flex items-center gap-1">
            <i class="bi bi-chevron-right"></i> About Us
          </h1>
          <p class="block">
            Dicla Travel – Agencia peruana especializada en tours culturales, de aventura y
            ecológicos por todo Perú.
          </p>
        </div>
      </div>
      <div class="flex justify-center items-start border-l p-6 border-zinc-100 h-[200px]">
        <div class="flex flex-col min-w-[346px] w-[90%]">
          <h1 class="text-lg montserrat-600 flex items-center gap-1">
            <i class="bi bi-chevron-right"></i>Services
          </h1>
          <p class="block">
            Dicla Travel – Agencia peruana especializada en tours culturales, de aventura y
            ecológicos por todo Perú.
          </p>
        </div>
      </div>
      <div class="flex flex-col justify-start border-l p-6 border-zinc-100 h-[200px]">
        <div class="flex flex-col min-w-[346px] w-[90%]">
          <h1 class="text-lg montserrat-600 mb-2 flex items-center gap-1">
            <i class="bi bi-chevron-right"></i> Social
          </h1>
          <ul class="flex flex-wrap gap-3">
            <li class="flex justify-baseline gap-2 social-icon cursor-pointer">
              <i class="bi bi-instagram text-lg duration-300 transition-all"></i>
              <span class="duration-300 transition-all">Instagram</span>
            </li>
            <li class="flex justify-baseline gap-2 social-icon cursor-pointer">
              <i class="bi bi-tiktok text-lg duration-300 transition-all"></i>
              <span class="duration-300 transition-all">Tiktok</span>
            </li>
            <li class="flex justify-baseline gap-2 social-icon cursor-pointer">
              <i class="bi bi-whatsapp text-lg duration-300 transition-all"></i>
              <span class="duration-300 transition-all">Whatsapp</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts"></script>
<style scoped>
li.social-icon:hover > i.bi-instagram,
li.social-icon:hover > i.bi-instagram + span {
  color: var(--color-pink-400) !important;
}

li.social-icon:hover > i.bi-tiktok,
li.social-icon:hover > i.bi-tiktok + span {
  color: var(--color-cyan-400) !important;
}

li.social-icon:hover > i.bi-whatsapp,
li.social-icon:hover > i.bi-whatsapp + span {
  color: var(--color-green-400) !important;
}
</style>
