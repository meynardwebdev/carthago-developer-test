import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useToast } from "vue-toastification";

export default function useCustomers() {
    const customer = ref([])
    const customers = ref([])

    const errors = ref('')
    const router = useRouter()

    const toast = useToast()

    const getCustomers = async () => {
        let response = await axios.get('/api/customers')
        customers.value = response.data.data
    }

    const getCustomer = async (id) => {
        let response = await axios.get(`/api/customers/${id}`)
        customer.value = response.data.data
    }

    const storeCustomer = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/customers', data)
            await router.push({ name: 'customers.index' })
            toast.success('Customer has been created.')
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateCustomer = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/customers/${id}`, customer.value)
            toast.success('Customer has been updated.')
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
        customer,
        customers,
        getCustomer,
        getCustomers,
        storeCustomer,
        updateCustomer
    }
}
