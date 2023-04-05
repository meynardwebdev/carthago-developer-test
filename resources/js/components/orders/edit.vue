<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveOrder">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="id" class="block text-sm font-medium text-gray-700">Order Number</label>
                <div class="mt-1">
                    <input type="text" name="id" id="id" readonly
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm"
                        v-model="order.id">
                </div>
            </div>

            <div>
                <label for="date_ordered" class="block text-sm font-medium text-gray-700">Date ordered</label>
                <div class="mt-1">
                    <input type="text" name="date_ordered" id="date_ordered"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="order.date_ordered">
                </div>
            </div>

            <div>
                <label for="date_shipped" class="block text-sm font-medium text-gray-700">Date shipped</label>
                <div class="mt-1">
                    <input type="text" name="date_shipped" id="date_shipped"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="order.date_shipped">
                </div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <input type="text" name="status" id="status"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="order.status">
                </div>
            </div>

            <div>
                <label for="comments" class="block text-sm font-medium text-gray-700">Comments</label>
                <div class="mt-1">
                    <textarea name="comments" id="comments"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="order.comments"></textarea>
                </div>
            </div>
        </div>

        <button type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-indigo-600 border mr-2"
        >Save</button>
        <router-link :to="{ name: 'orders.index' }"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-gray-800 border"
        >Cancel</router-link>
    </form>
</template>

<script setup>
import { onMounted } from 'vue';
import useOrders from "../../composables/orders";

const { errors, order, updateOrder, getOrder } = useOrders()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getOrder(props.id))

const saveOrder = async () => {
    await updateOrder(props.id)
}
</script>
