<template>
    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <div class="flex mb-4 float-left">
            <div class="px-4 py-2 text-white bg-gray-800 cursor-pointer hover:bg-gray-600">
                <router-link :to="{ name: 'dashboard' }" class="text-sm font-medium">Back</router-link>
            </div>
        </div>

        <div class="flex mb-4 place-content-end">
            <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
                <router-link :to="{ name: 'employee.create' }" class="text-sm font-medium">Create employee</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Job Title</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Email</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Office ID</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Actions</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="employee in employees" :key="employee.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ employee.first_name + ' ' + employee.last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ employee.job_title }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ employee.email }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ employee.office_id }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap">
                            <router-link :to="{ name: 'employee.edit', params: { id: employee.id } }"
                                 class="px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase bg-indigo-600">
                                Edit
                            </router-link>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import useEmployees from '../../composables/employees'
import { onMounted } from 'vue';

const { employees, getEmployees } = useEmployees()

onMounted(getEmployees)
</script>
