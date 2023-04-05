import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useToast } from "vue-toastification";

export default function useEmployees() {
    const employee = ref([])
    const employees = ref([])

    const errors = ref('')
    const router = useRouter()

    const toast = useToast();

    const getEmployees = async () => {
        let response = await axios.get('/api/employees')
        employees.value = response.data.data
    }

    const getEmployee = async (id) => {
        let response = await axios.get(`/api/employees/${id}`)
        employee.value = response.data.data
    }

    const storeEmployee = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/employees', data)
            await router.push({ name: 'employees.index' })
            toast.success('Employee has been created.')
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateEmployee = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/employees/${id}`, employee.value)
            toast.success('Employee has been updated.')
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    return {
        errors,
        employee,
        employees,
        getEmployee,
        getEmployees,
        storeEmployee,
        updateEmployee
    }
}
