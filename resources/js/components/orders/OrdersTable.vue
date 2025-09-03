<template>
  <div class="table-wrapper">
    <OrdersFilters :statuses="statuses" @filter-change="onFilterChange" />
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>Recipient</th>
          <th>Address</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <OrderRow
          v-for="(order, index) in orders.data"
          :key="order.id"
          :order="order"
          :index="index"
          :statuses="statuses"
          @updated="onOrderUpdated"
        />
      </tbody>
    </table>

    <div class="pagination" v-if="orders.last_page > 1">
      <button :disabled="orders.current_page === 1" @click="fetchOrders(orders.current_page - 1)">Prev</button>
      <span>Page {{ orders.current_page }} of {{ orders.last_page }}</span>
      <button :disabled="orders.current_page === orders.last_page" @click="fetchOrders(orders.current_page + 1)">Next</button>
    </div>
  </div>
</template>

<script setup>
import { reactive, onMounted } from 'vue'
import axios from 'axios'
import OrderRow from './OrderRow.vue'
import OrdersFilters from './OrdersFilters.vue'

const props = defineProps({ statuses: Array })
const orders = reactive({ data: [], current_page: 1, last_page: 1 })
const filter = reactive({ recipient: '', status: '' })

const fetchOrders = async (page = 1) => {
  const res = await axios.get('/api/order', {
    params: { page, recipient: filter.recipient, status: filter.status }
  })
  Object.assign(orders, res.data)
}

const onFilterChange = (f) => { Object.assign(filter, f); fetchOrders(1) }
const onOrderUpdated = (order) => { /* optional callback */ }

onMounted(() => fetchOrders())
</script>

<style scoped>
.table-wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin: 2rem 0;
}
table {
  border-collapse: collapse;
  width: 80%;
  box-shadow: 0 0 6px rgba(0,0,0,0.1);
  font-family: Arial, sans-serif;
  color: #333;
}
thead th {
  background-color: #2c3e50;
  color: #fff;
  padding: 0.75rem;
  text-align: center;
}
.pagination {
  margin-top: 1rem;
  display: flex;
  gap: 1rem;
  align-items: center;
}
</style>
