<script setup lang="ts">
import { ref } from 'vue';
import DepartureDetail from '@/Components/DepartureDetail.vue';
import DepartureSortable from '@/Components/DepartureSortable.vue';
import { Head } from '@inertiajs/vue3';

const departureSelected = ref<any>()

const handleDepartureSelected = (item: any) => {
    departureSelected.value = item
}

</script>

<template>
     <div class="w-8/12 p-8 mx-auto">
         <Head title="Sortable" />
         <DepartureSortable @departure-selected="handleDepartureSelected"/>
         <DepartureDetail  :departure-selected="departureSelected" />
     </div>
</template>

