<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveEmployee">
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
                <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                <div class="mt-1">
                    <input type="text" name="job_title" id="job_title"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.job_title">
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="email" id="email"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.email">
                </div>
            </div>

            <div>
                <label for="office_id" class="block text-sm font-medium text-gray-700">Office</label>
                <div class="mt-1">
                    <input type="text" name="office_id" id="office_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.office_id">
                </div>
            </div>

            <div>
                <label for="reports_to" class="block text-sm font-medium text-gray-700">Immediate superior</label>
                <div class="mt-1">
                    <input type="text" name="reports_to" id="reports_to"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.reports_to">
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
import useEmployees from "../../composables/employees";

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

const { errors, storeEmployee } = useEmployees()

const saveEmployee = async () => {
    await storeEmployee({ ...form })
}
</script>
