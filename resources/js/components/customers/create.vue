<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveCustomer">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <div class="mt-1">
                    <input type="text" name="first_name" id="first_name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.first_name">
                </div>
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <div class="mt-1">
                    <input type="text" name="last_name" id="last_name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.last_name">
                </div>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <div class="mt-1">
                    <input type="text" name="phone" id="phone"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.phone">
                </div>
            </div>

            <div>
                <label for="address_line_1" class="block text-sm font-medium text-gray-700">Address line 1</label>
                <div class="mt-1">
                    <input type="text" name="address_line_1" id="address_line_1"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.address_line_1">
                </div>
            </div>

            <div>
                <label for="address_line_2" class="block text-sm font-medium text-gray-700">Address line 2</label>
                <div class="mt-1">
                    <input type="text" name="address_line_2" id="address_line_2"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.address_line_2">
                </div>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <div class="mt-1">
                    <input type="text" name="city" id="city"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.city">
                </div>
            </div>

            <div>
                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                <div class="mt-1">
                    <input type="text" name="state" id="state"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.state">
                </div>
            </div>

            <div>
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                <div class="mt-1">
                    <input type="text" name="postal_code" id="postal_code"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.postal_code">
                </div>
            </div>

            <div>
                <label for="credit_limit" class="block text-sm font-medium text-gray-700">Credit Limit</label>
                <div class="mt-1">
                    <input type="text" name="credit_limit" id="credit_limit"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.credit_limit">
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
import useCustomers from "../../composables/customers";
import {useToast} from "vue-toastification";

const toast = useToast();
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

const { errors, storeCustomer } = useCustomers()

const saveCustomer = async () => {
    await storeCustomer({ ...form })
    toast.success('Customer has been created.')
}
</script>
