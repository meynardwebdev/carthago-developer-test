<template>
    <div class="grid grid-cols-4 gap-4 my-5 p-5">
        <template v-for="(count, record_type) in records">
            <div class="rounded w-50 shadow-md py-3 hover:bg-indigo-100">
                <div class="px-6 py-4">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white capitalize">
                        {{ record_type }}
                        <span class="float-right text-sm">({{ count }})</span>
                    </h5>
                </div>
                <div class="px-6 pt-2 pb-2">
                    <router-link
                        :to="{ name: record_type + '.index' }"
                        class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase bg-indigo-600 mb-3"
                    >View</router-link>
                </div>
            </div>
        </template>
    </div>
</template>

<script setup>
import useRecords from '../composables/utils'
import { onMounted } from 'vue';

const { records, getRecordCount } = useRecords()

onMounted(getRecordCount)
</script>
