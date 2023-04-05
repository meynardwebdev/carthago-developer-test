<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveOrder">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="date_ordered" class="block text-sm font-medium text-gray-700">Date ordered</label>
                <div class="mt-1">
                    <input type="date" name="date_ordered" id="date_ordered"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.date_ordered">
                </div>
            </div>

            <div>
                <label for="date_shipped" class="block text-sm font-medium text-gray-700">Date shipped</label>
                <div class="mt-1">
                    <input type="date" name="last_name" id="date_shipped"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.date_shipped">
                </div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <input type="text" name="status" id="status"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.status">
                </div>
            </div>

            <div>
                <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                <div class="mt-1">
                    <input type="text" name="comments" id="comments"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.comments">
                </div>
            </div>

            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Order</label>
                <div class="mt-1">
                    <input type="text" name="customer_id" id="customer_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.customer_id">
                </div>
            </div>
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md ring-gray-300 hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
        >Create</button>
    </form>
</template>

<script setup>
import { reactive } from 'vue'
import useOrders from "../../composables/orders";

const form = reactive({
    first_name: '',
    last_name: '',
    phone: '',
    address_line_1: '',
    address_line_2: '',
    city: '',
    state: '',
    postal_code: '',
    credit_limit: 0,
})

const { errors, storeOrder } = useOrders()

const saveOrder = async () => {
    await storeOrder({ ...form })
}
</script>
