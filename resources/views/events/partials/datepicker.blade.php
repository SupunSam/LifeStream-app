<div x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
    <div class="relative">
        <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
        <input type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false"
            class="w-full py-3 pl-4 pr-10 font-medium leading-none text-gray-600 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-600 focus:ring-opacity-50"
            placeholder="Select date" readonly />

        <div class="absolute top-0 right-0 px-3 py-2">
            <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        </div>

        <div class="absolute top-0 left-0 p-4 mt-12 bg-white rounded-lg shadow" style="width: 17rem" x-show.transition="showDatepicker"
            @click.away="showDatepicker = false">


            <div class="flex flex-wrap mb-3 -mx-1">
                <template x-for="(day, index) in DAYS" :key="index">
                    <div style="width: 14.26%" class="px-0.5">
                        <div x-text="day" class="text-xs font-medium text-center text-gray-800"></div>
                    </div>
                </template>
            </div>

            <div class="flex flex-wrap -mx-1">
                <template x-for="blankday in blankdays">
                    <div style="width: 14.28%" class="p-1 text-sm text-center border border-transparent"></div>
                </template>
                <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                    <div style="width: 14.28%" class="px-1 mb-1">
                        <div @click="getDateValue(date)" x-text="date"
                            class="text-sm leading-none text-center transition duration-100 ease-in-out rounded-full cursor-pointer"
                            :class="{
                                'bg-indigo-200': isToday(date) == true,
                                'text-gray-600 hover:bg-indigo-200': isToday(date) == false && isSelectedDate(date) == false,
                                'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(date) == true
                            }">
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
