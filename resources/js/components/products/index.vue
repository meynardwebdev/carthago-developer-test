<template>
    <div class="min-w-full overflow-hidden overflow-x-auto align-middle sm:rounded-md">
        <div class="flex mb-4 float-left">
            <div class="px-4 py-2 text-white bg-gray-800 cursor-pointer hover:bg-gray-600">
                <router-link :to="{ name: 'dashboard' }" class="text-sm font-medium">Back</router-link>
            </div>
        </div>

        <div class="flex mb-4 place-content-end">
            <div class="px-4 py-2 text-white bg-indigo-600 cursor-pointer hover:bg-indigo-700">
                <router-link :to="{ name: 'product.create' }" class="text-sm font-medium">Create product</router-link>
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
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">SKU</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Description</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Vendor</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Quantity in stock</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Price</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">MSRP</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase">Product Line</span>
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="product in products" :key="product.id">
                    <tr class="bg-white hover:bg-gray-100">
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.name }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.sku }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.description }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.vendor }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.quantity_in_stock }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.price }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            {{ product.product_line_id }}
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-center text-gray-900 whitespace-no-wrap">
                            <router-link :to="{ name: 'product.edit', params: { id: product.id } }"
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
import useProducts from '../../composables/products'
import { onMounted } from 'vue';

const { products, getProducts } = useProducts()

onMounted(getProducts)
</script>
