<template>
  <div class="grid grid-cols-2" ref="firstSectionRef">
    <section
      class="col-span-2 bg-neutral-100 h-[calc(100vh-70px)] flex flex-col justify-between pt-5"
    >
      <InfiniteCarousel :carousel-cards="carouselCards" direction="left"></InfiniteCarousel>
      <div class="flex flex-col justify-center items-center mt-4">
        <h1 class="text-5xl flex items-center gap-3 text-white">
          <span class="poppins-bold text-zinc-800">1. Quienes</span>
          <span class="poppins-bold bg-zinc-800 p-3 text-neutral-100 rounded-xl">somos?</span>
        </h1>
        <p class="text-zinc-800 mt-3 text-center max-w-3xl justify-center">
          Somos una empresa comprometida con ofrecer experiencias auténticas y memorables. Creemos
          que la tecnología y la atención humana pueden trabajar juntas para crear servicios
          confiables, eficientes y centrados en las necesidades reales de las personas. Nuestro
          equipo está formado por profesionales apasionados por brindar la mejor experiencia
          posible, cuidando cada detalle para asegurar que cada usuario se sienta acompañado desde
          el primer momento.
        </p>
        <div class="mt-3 flex gap-3">
          <button
            class="bg-zinc-800 hover:bg-zinc-700 text-white px-8 py-4 rounded-full cursor-pointer transition-colors shadow-md"
          >
            Ver Mas
          </button>
          <button
            class="bg-zinc-50 hover:bg-zinc-100 text-zinc-900 px-8 py-4 rounded-full cursor-pointer transition-colors shadow-md"
          >
            Reserva ahora
          </button>
        </div>
        <br />
      </div>
      <InfiniteCarousel :carousel-cards="carouselCards" direction="right"></InfiniteCarousel>
    </section>
    <section
      class="col-span-2 bg-neutral-100 h-[calc(100vh-70px)] flex flex-col justify-center overflow-hidden bg-linear-to-b from-neutral-100 to-neutral-200"
    >
      <div class="flex items-center justify-center w-full h-[70%] shadow-2xl relative">
        <div class="bg-teal-700/90 w-full h-full absolute z-10"></div>
        <div class="overflow-hidden h-full w-full absolute">
          <img
            class="absolute"
            src="http://192.168.1.58/wp-content/uploads/2025/12/lima_miraflores_dicla-scaled.jpg"
            alt=""
          />
        </div>
        <div class="flex justify-between w-full max-w-7xl gap-20 relative z-20">
          <div class="flex flex-col justify-center items-center w-fit max-w-[600px]">
            <div class="flex flex-col w-full">
              <h1 class="text-5xl flex items-center gap-3 text-teal-100">
                <span class="poppins-bold">2. Qué</span>
                <span class="poppins-bold bg-emerald-500 p-3 text-teal-50 rounded-xl"
                  >hacemos?</span
                >
              </h1>
              <p class="text-teal-50 mt-3 text-justify w-full justify-center">
                Nos dedicamos a diseñar, organizar y ofrecer servicios que combinan calidad,
                facilidad de uso y seguridad. Utilizamos herramientas digitales avanzadas para
                optimizar procesos, mejorar la comunicación y garantizar que cada interacción sea
                clara y satisfactoria. <br /><br />
                Nuestro enfoque está puesto en brindar soluciones prácticas que realmente agreguen
                valor, simplifiquen tareas y mejoren la experiencia general de nuestros usuarios.
              </p>
            </div>
          </div>
          <div class="w-full flex justify-center items-center">
            <div class="relative w-full h-full">
              <figure
                class="overflow-hidden h-[480px] w-[340px] rounded-md absolute top-0 -left-3 shadow-lg -rotate-12 hover:-rotate-15 transition-transform cursor-pointer border-2 border-zinc-100"
              >
                <img
                  class="object-cover h-full w-full"
                  src="http://192.168.1.58/wp-content/uploads/2025/12/cusco_sacsayhuaman_tour-scaled.jpeg"
                  alt=""
                />
              </figure>
              <figure
                class="overflow-hidden h-[480px] w-[340px] rounded-md absolute bottom-0 -right-3 rotate-12 hover:rotate-15 transition-transform cursor-pointer border-2 border-zinc-100"
              >
                <img
                  class="object-cover h-full w-full"
                  src="http://192.168.1.58/wp-content/uploads/2025/12/young_woman_traveler.png"
                  alt=""
                />
              </figure>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="col-span-2 bg-neutral-200 h-[300vh] w-full flex flex-col items-center">
      <div
        class="sticky h-[calc(100vh-70px)] top-[70px] w-full flex justify-center overflow-hidden"
      >
        <div class="flex flex-col justify-center items-center">
          <div class="flex gap-10 max-w-6xl">
            <div
              class="flex flex-col w-full justify-center items-center h-full top-[70px] border-white overflow-hidden"
            >
              <h1 class="text-5xl flex items-center gap-3 text-neutral-100">
                <span class="poppins-bold text-neutral-800">3. Nuestra</span>
                <span class="poppins-bold bg-neutral-800 p-3 text-neutral-100 rounded-xl"
                  >Vision</span
                >
              </h1>
              <p class="text-neutral-800 mt-3 text-justify max-w-6xl">
                Aspiramos a convertirnos en un referente en nuestro sector, reconocido por la
                calidad de nuestro servicio, la innovación constante y la satisfacción de nuestros
                clientes. Nuestra visión es construir un ecosistema donde la tecnología y la
                experiencia humana se integren de manera natural, permitiendo que más personas
                accedan a soluciones eficientes y experiencias memorables. Buscamos crecer de forma
                sostenible, expandiendo nuestros servicios y elevando constantemente nuestros
                estándares.
              </p>
            </div>
            <div
              class="flex flex-col w-full justify-center items-center h-full top-[70px] border-white overflow-hidden"
            >
              <h1 class="text-5xl flex items-center gap-3 text-neutral-100">
                <span class="poppins-bold text-neutral-800">4. Nuestra</span>
                <span class="poppins-bold bg-neutral-800 p-3 text-neutral-100 rounded-xl"
                  >Mision</span
                >
              </h1>
              <p class="text-neutral-800 mt-3 text-justify max-w-6xl">
                Aspiramos a convertirnos en un referente en nuestro sector, reconocido por la
                calidad de nuestro servicio, la innovación constante y la satisfacción de nuestros
                clientes. Nuestra visión es construir un ecosistema donde la tecnología y la
                experiencia humana se integren de manera natural, permitiendo que más personas
                accedan a soluciones eficientes y experiencias memorables. Buscamos crecer de forma
                sostenible, expandiendo nuestros servicios y elevando constantemente nuestros
                estándares.
              </p>
            </div>
          </div>
          <div class="inline-flex items-center h-[500px]">
            <DiclaPolaroid
              v-for="(polaroidCard, index) in polaroidCards"
              :key="index"
              :img-url="polaroidCard.urlImage"
              :class="polaroidCard.class"
            />
          </div>
        </div>
      </div>
    </section>
    <div class="bg-linear-to-b from-neutral-200 to-white h-[200px] col-span-2"></div>
  </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from 'vue'

import { useSectionBackground } from '@/composables/useSectionBackground'
import DiclaPolaroid from '@/components/DiclaPolaroid.vue'
import InfiniteCarousel from '@/components/infinite-carousel/InfiniteCarousel.vue'
import type { CarouselCardProps } from '@/components/infinite-carousel/carousel-card.interface.props'

const emits = defineEmits(['top-section-bg-changed'])

const firstSectionRef = ref<HTMLElement | null>(null)

const polaroidCards: { urlImage: string; class: string }[] = [
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/nevadosanmateo.jpg',
    class: '-rotate-20 transform-fill',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/marcahuasi.jpg',
    class: '-rotate-10 transform-fill',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/lagunaparon.jpg',
    class: 'rotate-0 transform-fill',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/laguna69.jpg',
    class: 'rotate-10 transform-fill',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/kuelap.jpg',
    class: 'rotate-20 transform-fill',
  },
  // { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/choquequirao.jpg', class: "-rotate-20 transform-fill" },
  // { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/cerroblanco.avif', class: "-rotate-20 transform-fill" },
  // {
  //   urlImage:
  //     'http://192.168.1.58/wp-content/uploads/2025/12/cataratagallitodelasrocas.jpg',
  // },
  // {
  //   urlImage:
  //     'http://192.168.1.58/wp-content/uploads/2025/12/canondetinajani-e1765171059361.jpg',
  // },
  // { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/canondesonche.jpg' },
  // { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/bosquedepomac.jpg' },
]

const carouselCards: CarouselCardProps[] = [
  { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/macchupicchu_tour.jpg' },
  { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/lima_citytour.jpg' },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/arequipa_colcacanyontour-scaled.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/iquitos_selvatour-scaled.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/cusco_rainbowmountain_tour.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/cusco_moraymarassalt_tour.webp',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/cusco_sacsayhuaman_tour-scaled.jpeg',
  },
  { urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/lima_barranco_tour.webp' },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/lima_pachacamac_tour-scaled.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/lima_seafoodskewers_tour.webp',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/arequipa_volcanmisti_tour.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/arequipa_santacatalina_tour.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/arequipa_rutadelsillar_tour.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/amazonas_reservasamiria_tour.webp',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/iquitos_belenmarket_tour.jpg',
  },
  {
    urlImage: 'http://192.168.1.58/wp-content/uploads/2025/12/amazonas_nightsafari_tour.jpg',
  },
]

onMounted(() => {
  useSectionBackground({
    onSectionBackgroundChange: (data: { color: string; backgroundColor?: string }) => {
      emits('top-section-bg-changed', data)
    },
  }).observeItemsFromWrapper(firstSectionRef.value!)
})
</script>
<style></style>
