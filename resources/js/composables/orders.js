import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useToast } from "vue-toastification";

export default function useOrders() {
    const order = ref([])
    const orders = ref([])

    const errors = ref('')
    const router = useRouter()

    const toast = useToast();

    const getOrders = async () => {
        let response = await axios.get('/api/orders')
        orders.value = response.data.data
    }

    const getOrder = async (id) => {
        let response = await axios.get(`/api/orders/${id}`)
        order.value = response.data.data
    }

    const storeOrder = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/orders', data)
            await router.push({ name: 'orders.index' })
            toast.success('Order has been created.')
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateOrder = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/orders/${id}`, order.value)
            toast.success('Order has been updated.')
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
        order,
        orders,
        getOrder,
        getOrders,
        storeOrder,
        updateOrder
    }
}
