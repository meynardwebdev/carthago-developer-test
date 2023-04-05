import { ref } from 'vue'
import axios from 'axios'

export default function useRecords() {
    const records = ref([])

    const getRecordCount = async () => {
        let response = await axios.get('/api/records')
        records.value = response.data.data
    }

    return {
        records,
        getRecordCount
    }
}
