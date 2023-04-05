<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveProduct">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.name">
                </div>
            </div>

            <div>
                <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                <div class="mt-1">
                    <input type="text" name="sku" id="sku"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.sku">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <textarea
                        name="description"
                        id="description"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.description"
                    ></textarea>
                </div>
            </div>

            <div>
                <label for="vendor" class="block text-sm font-medium text-gray-700">Vendor</label>
                <div class="mt-1">
                    <input type="text" name="vendor" id="vendor"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.vendor">
                </div>
            </div>

            <div>
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity in stock</label>
                <div class="mt-1">
                    <input type="number" name="quantity_in_stock" id="quantity"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.quantity_in_stock">
                </div>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-1">
                    <input type="text" name="price" id="price"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.price">
                </div>
            </div>

            <div>
                <label for="msrp" class="block text-sm font-medium text-gray-700">MSRP</label>
                <div class="mt-1">
                    <input type="text" name="msrp" id="msrp"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.msrp">
                </div>
            </div>

            <div>
                <label for="product_line_id" class="block text-sm font-medium text-gray-700">Product line</label>
                <div class="mt-1">
                    <input type="text" name="product_line_id" id="product_line_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="product.product_line_id">
                </div>
            </div>
        </div>

        <button
            type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-indigo-600 border mr-2"
        >Save</button>
        <router-link
            :to="{ name: 'products.index' }"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-gray-800 border"
        >Cancel</router-link>
    </form>
</template>

<script setup>
import { onMounted } from 'vue';
import useProducts from "../../composables/products";

const { errors, product, updateProduct, getProduct } = useProducts()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getProduct(props.id))

const saveProduct = async () => {
    await updateProduct(props.id)
}
</script>
