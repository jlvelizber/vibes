<script setup lang="ts">

defineProps<{
    departureSelected: any,
}>();



</script>
<template>
    <div v-if="departureSelected">

        <div class="flex py-6">
            <div class="bg-green-200 p-4 rounded-lg shadow">
                <h2 class="text-lg font-bold mb-4">Data Information</h2>
                <ul class="list-disc list-inside">
                    <li class="text-green-700 mb-2"> <strong>ID: </strong> <span class="tex-black"> {{
                        departureSelected?.id }}</span> </li>
                    <li class="text-green-700 mb-2"> <strong>Alternative Name: </strong> <span class="tex-black"> {{
                        departureSelected?.alternative_names?.join(' ') || 'No Data' }}</span> </li>
                    <li class="text-green-700 mb-2"><strong>Country: </strong> <span class="tex-black"> {{
                        departureSelected?.country?.name }}</span></li>
                    <li class="text-green-700 mb-2"><strong>Continent: </strong> <span class="tex-black"> {{
                        departureSelected?.continent?.name }}</span></li>
                   
                </ul>

            </div>
        </div>
    </div>
</template>