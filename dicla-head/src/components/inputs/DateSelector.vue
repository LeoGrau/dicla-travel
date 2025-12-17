<template>
  <div class="relative flex flex-col gap-1">
    <label for="" class="text-xs text-indigo-600 montserrat-500">From</label>
    <input
      :value="currentDate.toLocaleDateString()"
      @click="visibleCalendar = !visibleCalendar"
      class="outline outline-zinc-300 rounded-full transition-shadow p-2 hover:shadow-[0_0_0_0.2rem_var(--color-indigo-200)] hover:outline-indigo-400 text-sm pl-4 montserrat-500"
      type="text"
    />
    <div
      class="absolute calendar-wrapper w-[320px] border border-zinc-200 bg-white rounded-2xl z-50 transition-[height] flex flex-col overflow-hidden"
      :class="{
        'h-0 border-none': !visibleCalendar,
        'h-[310px]': visibleCalendar && statusMode == 'day',
        'h-[230px]': visibleCalendar && statusMode == 'month',
      }"
    >
      <div class="flex justify-between mx-6 pt-4 mb-2 pb-2 border-b border-b-zinc-200">
        <button
          @click="currentDate = subMonths(currentDate, 1)"
          class="transition-colors duration-200 hover:bg-slate-100 h-8 w-8 flex justify-center items-center rounded-full cursor-pointer"
        >
          <i class="bi-chevron-left"></i>
        </button>
        <div class="flex gap-2">
          <button
            @click="statusMode = 'month'"
            class="text-sm cursor-pointer transition-colors duration-200 text-slate-800 hover:bg-slate-100 px-2 py-1 rounded-lg inter-500"
          >
            {{ months[currentDate.getMonth()] }}
          </button>
          <button
            @click="statusMode = 'year'"
            class="text-sm cursor-pointer transition-colors duration-200 text-slate-800 hover:bg-slate-100 px-2 py-1 rounded-lg inter-500"
          >
            {{ currentDate.getFullYear() }}
          </button>
        </div>
        <button
          @click="currentDate = addMonths(currentDate, 1)"
          class="transition-colors duration-200 hover:bg-slate-100 h-8 w-8 flex justify-center items-center rounded-full cursor-pointer"
        >
          <i class="bi-chevron-right"></i>
        </button>
      </div>
      <div class="calendar p-4 pt-0" :class="dynamicWrapperClass">
        <div
          @click="manageClickMode(date, index)"
          class="cursor-pointer transition-colors duration-200 text-sm"
          :class="dynamicItemClass(date)"
          v-for="(date, index) in dataMode"
          :key="index"
        >
          {{ dataPrint(date) }}
        </div>
      </div>
    </div>
  </div>
</template>
<script setup lang="ts">
import { computed, onMounted, ref, type Ref } from 'vue'

import {
  addMonths,
  eachDayOfInterval,
  endOfMonth,
  endOfWeek,
  getYear,
  isSameDay,
  set,
  startOfMonth,
  startOfWeek,
  subMonths,
} from 'date-fns'

const visibleCalendar = ref(false)

const statusMode: Ref<'year' | 'day' | 'month'> = ref('day')

const currentDate = ref<Date>(new Date())

function getStartCalendarDateOfMonth(date: Date) {
  const startDateOfMonth = startOfMonth(date)
  const startCalendarDateOfMoth = startOfWeek(startDateOfMonth)
  return startCalendarDateOfMoth
}

function getLastCalendarDateOfMonth(date: Date) {
  // This is end from the month, but you know that in real calendars, they usually shows part of the next month.
  const lastDateOfMoth = endOfMonth(date)
  // To get that value we need value from the last week so... this is always in the end of the month (not calendar month)
  const lastCalendarDateOfMonth = endOfWeek(lastDateOfMoth, { weekStartsOn: 0 })
  return lastCalendarDateOfMonth
}

const monthDates = computed(() => {
  console.log(
    eachDayOfInterval({
      start: getStartCalendarDateOfMonth(currentDate.value),
      end: getLastCalendarDateOfMonth(currentDate.value),
    }),
  )
  return eachDayOfInterval({
    start: getStartCalendarDateOfMonth(currentDate.value),
    end: getLastCalendarDateOfMonth(currentDate.value),
  })
})

const months = [
  'January',
  'February',
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
]

const dataMode = computed(() => {
  let data: any[] = []
  switch (statusMode.value) {
    case 'day':
      data = monthDates.value
      break
    case 'year':
      data = Array.from({ length: 9 }, (_, index) => getYear(currentDate.value) + index)
      break
    case 'month':
      data = months
      break
    default:
      break
  }
  console.log(data)
  return data
})

const dynamicItemClass = (data?: Date | any) => {
  const endOfCurrentMonth = endOfMonth(currentDate.value)
  const startOfCurrenMonth = startOfMonth(currentDate.value)
  const dateBelongsToMonth =
    (data as Date) > endOfCurrentMonth || (data as Date) < startOfCurrenMonth
  const { isDayDate, isMonthDate, isYearDate } = {
    isDayDate: isSameDay(data as Date, currentDate.value),
    isMonthDate: currentDate.value.getMonth() == months.indexOf(data),
    isYearDate: currentDate.value.getFullYear() == data,
  }

  let dataClass = {}
  switch (statusMode.value) {
    case 'day':
      dataClass = {
        'text-slate-300': dateBelongsToMonth,
        'aspect-square rounded-full hover:bg-indigo-200 flex items-center justify-center h-10':
          !dateBelongsToMonth && !isDayDate,
        'aspect-square bg-indigo-500 text-white rounded-full flex items-center justify-center h-10':
          isDayDate,
      }
      break
    case 'year':
      dataClass = {
        'hover:bg-slate-100 px-3 py-2 rounded-lg': !isYearDate,
        'bg-indigo-500 text-white px-3 py-2 rounded-lg': isYearDate,
      }
      break
    case 'month':
      dataClass = {
        'hover:bg-slate-100 px-2 py-1 rounded-lg': !isMonthDate,
        'bg-indigo-500 text-white px-3 py-2 rounded-lg': isMonthDate,
      }
      break
    default:
      break
  }
  return dataClass
}

const dynamicWrapperClass = computed(() => {
  let dataClass = ''
  switch (statusMode.value) {
    case 'day':
      dataClass =
        'grid grid-cols-7 gap-2 justify-items-center h-full justify-items-center items-center'
      break
    case 'year':
      dataClass =
        'grid grid-cols-3 justify-items-center gap-1 h-full justify-items-center items-center'
      break
    case 'month':
      dataClass =
        'grid grid-cols-3 justify-items-center gap-3 h-full justify-items-center items-center'
      break
    default:
      break
  }
  return dataClass
})

const dataPrint = (data: Date | string) => {
  let print = null
  switch (statusMode.value) {
    case 'day':
      print = (data as Date).getDate()
      break
    case 'year':
      print = data
      break
    case 'month':
      print = data
      break
    default:
      break
  }
  return print
}

function manageClickMode(data: any, index?: number) {
  switch (statusMode.value) {
    case 'day':
      visibleCalendar.value = false
      currentDate.value = data
      break
    case 'year':
      statusMode.value = 'month'
      currentDate.value = set(currentDate.value, { year: data })
      break
    case 'month':
      statusMode.value = 'day'
      currentDate.value = set(currentDate.value, { month: index })
      break
    default:
      break
  }
}

onMounted(() => {})
</script>
<style scoped></style>
