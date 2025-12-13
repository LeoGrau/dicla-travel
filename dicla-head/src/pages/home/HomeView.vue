<template>
  <div class="view" id="home-view-wrapper" ref="firstSectionRef">
    <section class="h-[calc(100vh-70px)] relative bg-blue-50 overflow-hidden z-20">
      <div
        ref="layer1"
        class="flex flex-col justify-center items-center gap-6 h-[calc(100vh-70px)] z-50 relative translate-y-[-90px]"
      >
        <h1 class="text-5xl flex flex-col gap-3 items-center">
          <span class="montserrat-400">Tu próxima aventura empieza</span>
          <span class="montserrat-400"
            >con <span class="pacifico-regular text-6xl">Dicla</span></span
          >
        </h1>
        <button class="rounded-full w-[250px] h-[60px] bg-black text-white cursor-pointer">
          Reserva Ahora
        </button>
      </div>
      <div ref="layer2" class="layer2 absolute w-full z-40"></div>
      <div ref="layer3" class="layer3 absolute w-full"></div>
      <div ref="layer4" class="layer4 absolute w-full"></div>
    </section>
    <section class="h-[300vh] bg-neutral-50">
      <div
        class="bg-zinc-50 h-[calc(100vh-70px)] flex flex-col justify-center items-center sticky top-[70px] z-20 w-full"
      >
        <div class="relative w-full flex justify-center pt-20">
          <div ref="condorRef" class="absolute w-[320px] -top-[45px] right-0">
            <img
              class="w-full"
              src="http://192.168.1.58/wp-content/uploads/2025/12/condor_animal.png"
              alt=""
            />
          </div>
          <div class="max-w-6xl relative">
            <h1 class="text-5xl poppins-bold flex flex-col gap-1 text-zinc-700">
              <span class="flex gap-2 items-center"
                ><span class="poppins-bold text-indigo-400 text-6xl">Escápate</span>
                <span class="poppins-semibold">por un</span>
                <span class="poppins-bold p-2 bg-indigo-400 text-zinc-100 rounded-xl">día</span>
              </span>
              <span class="poppins-semibold flex items-center gap-2"
                >con nuestros <span class="poppins-bold text-indigo-400 text-6xl">Tours</span></span
              >
            </h1>
            <p class="flex flex-col mb-3">
              <span> Aventuras épicas comienzan donde tu sofá termina. </span>
              <span>Dale un vistazo a nuestros tours personalizados.</span>
            </p>
            <div class="relative w-[1136px]">
              <div class="overflow-hidden py-5 w-full">
                <div
                  class="flex justify-content-center items-ceter gap-4 transition-transform duration-200"
                  :style="{ transform: `translateX(-${tourXScroll}px)` }"
                >
                  <TourCard
                    :tourCard="tour"
                    :dark-component-mode="false"
                    v-for="(tour, index) in tours"
                    :key="index"
                  ></TourCard>
                </div>
              </div>
              <div class="flex justify-between absolute top-[35%] w-6xl">
                <button
                  @click="handleTourScroll('L')"
                  class="rounded-full p-3 bg-white hover:bg-zinc-100 cursor-pointer shadow -translate-x-4"
                >
                  <ArrowLeft></ArrowLeft>
                </button>
                <button
                  @click="handleTourScroll('R')"
                  class="rounded-full p-3 bg-white hover:bg-zinc-100 cursor-pointer shadow translate-x-4"
                >
                  <ArrowRight></ArrowRight>
                </button>
              </div>
            </div>
            <RouterLink class="self-start text-indigo-500 hover:text-indigo-700 inter-500" to=""
              >Ver todos nuestros planes</RouterLink
            >
          </div>
        </div>
      </div>
    </section>
    <section
      class="bg-neutral-100 h-fit flex flex-col justify-center items-center relative z-20 py-12"
    >
      <div class="max-w-6xl text-zinc-800">
        <h1 class="text-5xl poppins-bold flex flex-col gap-1 text-zinc-700 mb-2">
          <span class="flex gap-2 items-center text-zinc-800">
            <span class="poppins-semibold">Más</span>
            <span class="poppins-bold text-teal-400 text-6xl">elegantes</span>
            <span class="poppins-semibold">y de</span>
            <span class="poppins-bold text-zinc-100 px-2 py-3 rounded-xl bg-teal-400 text-6xl">
              lujo</span
            >
          </span>
        </h1>
        <p class="flex flex-col mb-3">
          <span> Tu sofá no te ofrece vistas así. Prueba un tour premium. </span>
          <span>Hecha un vistazo a estos.</span>
        </p>
      </div>
      <div class="flex flex-col gap-5">
        <TourCardSlider :tours="tours"></TourCardSlider>
        <TourCardSlider :tours="tours"></TourCardSlider>
      </div>
      <span class="mt-3 inline-block"
        >No fue suficiente? Tenemos mas.
        <RouterLink to="" class="text-teal-500 inter-500 hover:text-teal-600"
          >Haz click aqui.</RouterLink
        ></span
      >
    </section>
    <div class="bg-linear-to-b from-neutral-100 to-white h-[200px] w-full"></div>
  </div>
</template>
<script lang="ts" setup>
import TourCard from '@/components/TourCard.vue'
import { computed, onMounted, onUnmounted, ref } from 'vue'

import { ArrowRight, ArrowLeft } from 'lucide-vue-next'
import TourCardSlider from '@/components/TourCardSlider.vue'
import tourServiceGql from '@/services/tour.service.gql'
import type { TourCardType } from '@/types/tours/tour.interface'

import { useSectionBackground } from '@/composables/useSectionBackground'

const emits = defineEmits(['ga', 'top-section-bg-changed'])

const layer1 = ref<HTMLElement | null>(null)
const layer2 = ref<HTMLElement | null>(null)
const layer3 = ref<HTMLElement | null>(null)
const layer4 = ref<HTMLElement | null>(null)

const condorRef = ref<HTMLElement | null>(null)
const firstSectionRef = ref<HTMLElement | null>(null)

const MAX_ITEMS = 4
const JUMP = 1152

const tours = ref<TourCardType[]>([])

async function getTop16Tours() {
  tours.value = await tourServiceGql.getTopTours()
  console.log(tours.value)
}

const tourXScroll = ref(0)
function handleTourScroll(orientation: string) {
  const jumpOrientation = orientation == 'L' ? -JUMP : +JUMP
  const isOnMovementRange =
    tourXScroll.value + jumpOrientation < maxJumps.value * JUMP &&
    tourXScroll.value + jumpOrientation >= 0
  // Movement Range
  if (isOnMovementRange) tourXScroll.value += jumpOrientation
}

function handleCondorScroll() {
  const scrollY = window.scrollY
  const totalDistance = window.innerHeight * 3
  // Ratio
  const progress = window.innerWidth / totalDistance
  if (condorRef.value) condorRef.value.style.transform = `translateX(-${progress * scrollY}px)`
}

function handleScroll() {
  const scrollY = window.scrollY

  // console.log(scrollY)
  if (layer1.value) {
    layer1.value.style.transform = `translateY(${0.1 * scrollY})`
  }
  if (layer2.value) {
    layer2.value.style.transform = `translateY(calc(-50% - ${0.5 * scrollY}px))`
  }
  if (layer3.value) {
    layer3.value.style.transform = `translateY(calc(-50% - ${0.3 * scrollY}px))`
  }
  if (layer4.value) {
    layer4.value.style.transform = `translateY(calc(-50% - ${0.4 * scrollY}px)) translateX(30%)`
  }
}

const maxJumps = computed(() => {
  return tours.value.length / MAX_ITEMS
})

async function retrieve() {
  getTop16Tours()
}

onMounted(() => {
  window.addEventListener('scroll', () => {
    // const items = firstSectionRef.value!.querySelectorAll('section')
    // console.log('scrollgaa', items[0]?.getBoundingClientRect().top)
    // console.log('scrollgaa', items[1]?.getBoundingClientRect().top)
    handleScroll()
    handleCondorScroll()
  })

  // emitBackgroundColorChange()
  emits('ga')

  useSectionBackground({
    onSectionBackgroundChange: (data: { color: string; backgroundColor?: string }) => {
      emits('top-section-bg-changed', data)
    },
  }).observeItemsFromWrapper(firstSectionRef.value!)
  retrieve()
})

onUnmounted(() => {
  window.removeEventListener('scroll', () => {
    handleScroll()
    handleCondorScroll()
  })
})
</script>
<style>
.layer2 {
  height: 100vh;
  background-image: url('http://192.168.1.58/wp-content/uploads/2025/12/Sacsayhuaman_Cusco_Peru_2015-07-31_DD_01.png');
  background-size: auto;
  background-position: top;
  background-repeat: no-repeat;
  transform: translateY(-50%);
}

.layer3 {
  height: 100vh;
  background-image: url('http://192.168.1.58/wp-content/uploads/2025/12/montanas-hero.avif');
  background-size: cover;
  background-position: top;
  background-repeat: no-repeat;
  transform: translateY(-40%);
}

.layer4 {
  height: 100vh;
  background-image: url('http://192.168.1.58/wp-content/uploads/2025/12/machu-picchu-hero.avif');
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  transform: translateY(-50%) translateX(30%);
}

.content {
  z-index: 1;
  color: black;
}
</style>
