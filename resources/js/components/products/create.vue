<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveProduct">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.name">
                </div>
            </div>

            <div>
                <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                <div class="mt-1">
                    <input type="text" name="last_name" id="sku"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.sku">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea name="description"
                        id="description"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.description"
                    ></textarea>
                </div>
            </div>

            <div>
                <label for="vendor" class="block text-sm font-medium text-gray-700">Vendor</label>
                <div class="mt-1">
                    <input type="text" name="vendor" id="vendor"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.vendor">
                </div>
            </div>

            <div>
                <label for="quantity_in_stock" class="block text-sm font-medium text-gray-700">Quantity in stock</label>
                <div class="mt-1">
                    <input type="number" name="quantity_in_stock" id="quantity_in_stock"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.quantity_in_stock">
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-1">
                    <input type="text" name="price" id="price"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.price">
                </div>
            </div>

            <div>
                <label for="msrp" class="block text-sm font-medium text-gray-700">MSRP</label>
                <div class="mt-1">
                    <input type="text" name="msrp" id="msrp"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.msrp">
                </div>
            </div>

            <div>
                <label for="product_line_id" class="block text-sm font-medium text-gray-700">Product Line</label>
                <div class="mt-1">
                    <input type="text" name="product_line_id" id="product_line_id"
                       class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       v-model="form.product_line_id">
                </div>
            </div>
        </div>

        <button
            type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
        >Create</button>
    </form>
</template>

<script setup>
import { reactive } from 'vue'
import useProducts from "../../composables/products";

const form = reactive({
    name: '',
    sku: '',
    description: '',
    vendor: '',
    quantity_in_stock: 0,
    price: 0,
    msrp: 0,
    product_line_id: '',
})

const { errors, storeProduct } = useProducts()

const saveProduct = async () => {
    await storeProduct({ ...form })
}
</script>
