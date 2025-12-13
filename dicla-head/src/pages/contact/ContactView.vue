<template>
  <div class="contact-view h-full w-full" ref="firstSectionRef">
    <section
      class="relative bg-transparent bg-linear-165 from-[rgb(0,38,103)] from-10% via-[#327fcc] via-40% to-[rgb(119,175,231)] to-90% h-screen w-full flex justify-center items-center overflow-hidden"
    >
      <figure class="w-full absolute">
        <img
          class="h-full w-full object-cover translate-y-[45%]"
          src="http://192.168.1.58/wp-content/uploads/2025/12/huascaran-scaled.png"
          alt=""
        />
      </figure>
      <div class="max-w-6xl w-full flex flex-col items-center gap-20 relative">
        <div class="flex flex-col gap-5 items-center">
          <h1 class="text-6xl poppins-bold text-zinc-100">
            <span class="poppins-bold bg-blue-900 text-blue-50 p-2 rounded-xl">Listo</span>
            <span class="poppins-bold text-shadow-lg"> para tu siguiente aventura? </span>
          </h1>
          <div class="flex gap-2">
            <a
              href="#contactForm"
              class="bg-blue-900 text-blue-50 rounded-full px-6 py-4 inter-500 shadow-lg"
            >
              Contactanos ahora
            </a>
          </div>
        </div>
      </div>
    </section>
    <section
      id="contactForm"
      class="bg-blue-100 h-[calc(100vh)] flex items-center justify-center gap-15"
    >
      <div class="max-w-[1360px] flex gap-10 w-full text-blue-950">
        <div class="rounded border-2 border-blue-800/0 w-3/5 flex flex-col justify-evenly">
          <div class="flex flex-col mt-4 max-w-[500px]">
            <h1 class="poppins-semibold text-5xl">Habla con nosotros</h1>
            <span class="montserrat-400 mt-3"
              >Contáctanos para planear tu próxima aventura con Dicla.</span
            >
            <span class="montserrat-400">
              Llámanos o completa el formulario y con gusto te ayudaremos a organizar el tour
              perfecto para ti.</span
            >
            <div class="mt-2">
              <h1 class="montserrat-600">Mail</h1>
              <div class="flex gap-1 items-center">
                <MailIcon></MailIcon>
                <span class="montserrat-400">claudiablabla@gmail.com</span>
              </div>
            </div>
            <div class="mt-2">
              <h1 class="montserrat-600">Social</h1>
              <ul class="flex flex-col gap-1">
                <li class="flex gap-1">
                  <i class="bi bi-whatsapp"></i><span class="montserrat-400">+51 987654321</span>
                </li>
                <li class="flex gap-1">
                  <i class="bi bi-instagram"></i><span class="montserrat-400">@dicla_travel</span>
                </li>
              </ul>
            </div>
          </div>
          <div class="grid grid-cols-3 gap-x-8 gap-y-5 mt-3 text-blue-950">
            <div class="rounded-lg flex flex-col justify-start">
              <h1 class="inter-600 text-sm">Soporte General</h1>
              <p class="text-justify inter-400 text-sm mt-1">
                Estamos aquí para ayudarte con cualquier duda relacionada con nuestros tours,
                destinos o procesos de reserva.
              </p>
            </div>
            <div class="rounded-lg flex flex-col justify-start">
              <h1 class="inter-600 text-sm">Permisos y Documentación</h1>
              <p class="text-justify inter-400 text-sm mt-1">
                Tu opinión es importante para nosotros. Comparte tus sugerencias, experiencias o
                mejoras para seguir brindándote el mejor servicio.
              </p>
            </div>
            <div class="rounded-lg flex flex-col justify-start">
              <h1 class="inter-600 text-sm">Feedback y Recomendaciones</h1>
              <p class="text-justify inter-400 text-sm mt-1">
                Si deseas cotizar un tour, personalizar un paquete o coordinar una reserva, nuestro
                equipo comercial está listo para ayudarte.
              </p>
            </div>
            <div class="rounded-lg flex flex-col justify-start">
              <h1 class="inter-600 text-sm">Atención Comercial</h1>
              <p class="text-justify inter-400 text-sm mt-1">
                Si deseas cotizar un tour, personalizar un paquete o coordinar una reserva, nuestro
                equipo comercial está listo para ayudarte.
              </p>
            </div>
          </div>
        </div>
        <div class="flex flex-col gap-3 rounded-2xl p-10 bg-white shadow-lg w-2/5">
          <div class="flex flex-col gap-3">
            <h1 class="text-4xl poppins-semibold">Estemos en contacto</h1>
            <h4 class="text-sm">Puedes hablar con nosotros en cualquier momento.</h4>
          </div>
          <form class="flex flex-col gap-3 w-full">
            <div class="grid grid-cols-2 w-full gap-5">
              <InputText
                class="col-span-2"
                placeholder="Nombres"
                v-model="form.firstName"
              ></InputText>
              <InputText
                class="col-span-2"
                placeholder="Apellidos"
                v-model="form.lastName"
              ></InputText>
              <InputPhoneNumber :placeholder="'Telefono/Cel'" class="col-span-2"></InputPhoneNumber>
              <InputIcon class="col-span-2">
                <InputText class="col-span-2" placeholder="Email" v-model="form.email"></InputText>
              </InputIcon>
              <InputTextArea
                placeholder="Leave your message"
                class="col-span-2"
                v-model="form.message"
              ></InputTextArea>
              <!-- <InputText class="col-span-2" placeholder="Email" v-model="form.email"></InputText> -->
            </div>
            <div class="flex flex-col w-full justify-end gap-2">
              <button
                class="shadow rounded-full cursor-pointer transition-colors bg-blue-500 hover:bg-blue-600 inter-700 text-indigo-50 px-10 py-4 w-full"
              >
                Enviar
              </button>
              <small class="text-center"
                >Al enviar el formulario, aceptas nuestros
                <span class="inter-700">Terminos y Condiciones de Privacidad</span>. Usaremos tus
                datos <span class="inter-700">solo</span> para responder tu consulta.</small
              >
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="h-[200px] bg-linear-to-b from-blue-100 to-white"></section>
  </div>
</template>
<script setup lang="ts">
import { useSectionBackground } from '@/composables/useSectionBackground'
import { onMounted, reactive, ref, watch } from 'vue'
import InputText from '@/components/inputs/InputText.vue'
import InputIcon from '@/components/inputs/InputIcon.vue'
import InputTextArea from '@/components/inputs/InputTextArea.vue'
import { MailIcon } from 'lucide-vue-next'
import InputPhoneNumber from '@/components/inputs/InputPhoneNumber.vue'

const emits = defineEmits(['top-section-bg-changed'])

const firstSectionRef = ref<HTMLElement | null>(null)

const form = reactive({
  firstName: '',
  lastName: '',
  email: '',
  message: '',
})

const onSectionBackgroundChange = (data: { color: string; backgroundColor?: string } | any) => {
  emits('top-section-bg-changed', data)
}
const { observeItemsFromWrapper } = useSectionBackground({
  onSectionBackgroundChange,
})

onMounted(() => {
  observeItemsFromWrapper(firstSectionRef.value!)
})

watch(form, (current) => {
  console.log(current)
})
</script>
<style lang=""></style>
