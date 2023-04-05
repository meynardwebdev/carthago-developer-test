<template>
    <div v-if="errors">
        <div v-for="(v, k) in errors" :key="k" class="bg-red-400 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" v-on:submit.prevent="saveEmployee">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                <div class="mt-1">
                    <input type="text" name="first_name" id="first_name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.first_name">
                </div>
            </div>

            <div>
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                <div class="mt-1">
                    <input type="text" name="last_name" id="last_name"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.last_name">
                </div>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Job Title</label>
                <div class="mt-1">
                    <input type="text" name="phone" id="phone"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.job_title">
                </div>
            </div>

            <div>
                <label for="address_line_1" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="mt-1">
                    <input type="text" name="address_line_1" id="address_line_1"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.email">
                </div>
            </div>

            <div>
                <label for="address_line_2" class="block text-sm font-medium text-gray-700">Office</label>
                <div class="mt-1">
                    <input type="text" name="address_line_2" id="address_line_2"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.office_id">
                </div>
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Immediate Superior</label>
                <div class="mt-1">
                    <input type="text" name="city" id="city"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="employee.reports_to">
                </div>
            </div>
        </div>

        <button
            type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-indigo-600 border mr-2"
        >Save</button>
        <router-link
            :to="{ name: 'employees.index' }"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold text-white uppercase rounded-md bg-gray-800 border"
        >Cancel</router-link>
    </form>
</template>

<script setup>
import { onMounted } from 'vue';
import useEmployees from "../../composables/employees";

const { errors, employee, updateEmployee, getEmployee } = useEmployees()
const props = defineProps({
    id: {
        required: true,
        type: String
    }
})

onMounted(() => getEmployee(props.id))

const saveEmployee = async () => {
    await updateEmployee(props.id)
}
</script>
