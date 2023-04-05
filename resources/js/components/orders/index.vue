<template>
    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <div class="flex mb-4 float-left">
            <div class="px-4 py-2 text-white bg-gray-800 cursor-pointer hover:bg-gray-600">
                <router-link :to="{ name: 'dashboard' }" class="text-sm font-medium">Back</router-link>
            </div>
        </div>

        <div class="flex mb-4 place-content-end">
            <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
                <router-link :to="{ name: 'order.create' }" class="text-sm font-medium">Create order</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Order Number</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Date Ordered</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Date Shipped</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Status</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Actions</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="order in orders" :key="order.id">
                    <tr class="bg-white">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ order.id }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ order.date_ordered }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ order.date_shipped }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ order.status }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap">
                            <router-link :to="{ name: 'order.edit', params: { id: order.id } }"
                                 class="mr-2 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase bg-indigo-600"
                            >Edit</router-link>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import useOrders from '../../composables/orders'
import { onMounted } from 'vue';

const { orders, getOrders } = useOrders()

onMounted(getOrders)
</script>
