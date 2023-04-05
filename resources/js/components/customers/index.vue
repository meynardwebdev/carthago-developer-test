<template>
    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <div class="flex mb-4 float-left">
            <div class="px-4 py-2 text-white bg-gray-800 cursor-pointer hover:bg-gray-600">
                <router-link :to="{ name: 'dashboard' }" class="text-sm font-medium">Back</router-link>
            </div>
        </div>

        <div class="flex mb-4 place-content-end">
            <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
                <router-link :to="{ name: 'customer.create' }" class="text-sm font-medium">Create customer</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Name</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Address</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Phone</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Credit Limit</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Actions</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="customer in customers" :key="customer.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ customer.first_name + ' ' + customer.last_name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ customer.address_line_1 + ', ' + customer.address_line_2 + ', ' + customer.city + ' ' + customer.state + ' ' + customer.postal_code}}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ customer.phone }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ customer.credit_limit }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap">
                            <router-link :to="{ name: 'customer.edit', params: { id: customer.id } }"
                                 class="mr-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase bg-indigo-600">
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
import useCustomers from '../../composables/customers'
import { onMounted } from 'vue';

const { customers, getCustomers } = useCustomers()

onMounted(getCustomers)
</script>
