<script setup  lang="ts">
import AutoComplete, { AutoCompleteItemSelectEvent } from 'primevue/autocomplete';
import { ApiServices } from '@/Service'
import { ref, defineEmits } from "vue";
import { AxiosResponse } from 'axios';

const value = ref("");
const departures = ref<any[]>([]);
const lookingDeparture = ref<boolean>(false)
const emitItemDeparture = defineEmits(['departureSelected'])


const searchDepartures = async (event: any) => {
    lookingDeparture.value = true;
    const { data }: AxiosResponse = await ApiServices.loadDepartures(event.query)
    departures.value = data.map((item: any) => item);
    lookingDeparture.value = false;
}

const handleItemSelected = async ({ value }: AutoCompleteItemSelectEvent) => {
    emitItemDeparture('departureSelected', value)
}

const formatLabel = (item: any) => `${item.name}`

</script>

<template>
    <div class="w-full">
        <label class="py-3  d-block w-full text-green-700 font-semibold" for="departure">Choose a city</label>

    </div>
    <div class="w-full">
        <AutoComplete id="departure" v-model="value" :suggestions="departures" @complete="searchDepartures($event)"
            :loading="lookingDeparture" placeholder="Write a City" @item-select="handleItemSelected" panel-class="block"
            :option-label="formatLabel" />

    </div>
</template>