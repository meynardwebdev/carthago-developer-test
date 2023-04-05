import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
import { useToast } from "vue-toastification";

export default function useProducts() {
    const product = ref([])
    const products = ref([])

    const errors = ref('')
    const router = useRouter()

    const toast = useToast();

    const getProducts = async () => {
        let response = await axios.get('/api/products')
        products.value = response.data.data
    }

    const getProduct = async (id) => {
        let response = await axios.get(`/api/products/${id}`)
        product.value = response.data.data
    }

    const storeProduct = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/products', data)
            await router.push({ name: 'products.index' })
            toast.success('Product has been created.')
        } catch (e) {
            if (e.response.status === 422) {
                for (const key in e.response.data.errors) {
                    errors.value = e.response.data.errors
                }
            }
        }
    }

    const updateProduct = async (id) => {
        errors.value = ''
        try {
            await axios.patch(`/api/products/${id}`, product.value)
            toast.success('Product has been updated.')
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
        product,
        products,
        getProduct,
        getProducts,
        storeProduct,
        updateProduct
    }
}
