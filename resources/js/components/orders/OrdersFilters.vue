<template>
  <div class="filters">
    <input
      type="text"
      v-model="search"
      placeholder="Search by recipient"
      @input="$emit('filter-change', { recipient: search, status })"
    />
    <select v-model="status" @change="$emit('filter-change', { recipient: search, status })">
      <option value="">All Statuses</option>
      <option v-for="s in statuses" :key="s" :value="s">{{ s }}</option>
    </select>
  </div>
</template>

<script setup>
import { ref, watch } from 'vue'
const props = defineProps({ statuses: Array })
const search = ref('')
const status = ref('')
</script>

<style scoped>
.filters {
  margin-bottom: 1rem;
  display: flex;
  gap: 1rem;
}
</style>
