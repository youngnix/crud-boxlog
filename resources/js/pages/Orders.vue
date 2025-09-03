<template>
  <div class="orders-page">
    <h1>Orders Management</h1>
    <OrdersTable :statuses="statuses" />
  </div>
</template>

<script setup>
import OrdersTable from '@/components/orders/OrdersTable.vue'

const statuses = ['PENDING', 'IN_TRANSIT', 'DELIVERED']
</script>

<style scoped>
.orders-page {
  padding: 2rem;
}
h1 {
  text-align: center;
  margin-bottom: 1.5rem;
  font-family: Arial, sans-serif;
}
</style>
