<template>
  <tr :class="{ 'odd-row': index % 2 === 0 }">
    <td>{{ order.id }}</td>

    <td class="editable-cell">
      <input
        v-if="editing.recipient"
        v-model="editing.recipient"
        @blur="save('recipient')"
        @keyup.enter="save('recipient')"
        ref="recipientInput"
      />
      <span v-else @click="startEdit('recipient')">{{ order.recipient }}</span>
    </td>

    <td class="editable-cell">
      <input
        v-if="editing.address"
        v-model="editing.address"
        @blur="save('address')"
        @keyup.enter="save('address')"
        ref="addressInput"
      />
      <span v-else @click="startEdit('address')">{{ order.address }}</span>
    </td>

    <td class="editable-cell">
      <select
        v-if="editing.status"
        v-model="editing.status"
        @blur="save('status')"
        ref="statusInput"
      >
        <option v-for="s in statuses" :key="s" :value="s">{{ s }}</option>
      </select>
      <span v-else @click="startEdit('status')">{{ order.status }}</span>
    </td>
  </tr>
</template>

<script setup>
import { reactive, nextTick } from 'vue'
import axios from 'axios'

const props = defineProps({ order: Object, index: Number, statuses: Array })
const emits = defineEmits(['updated'])

const editing = reactive({ recipient: null, address: null, status: null })

const startEdit = async (field) => {
  editing[field] = props.order[field]
  await nextTick()
  // foca automaticamente no input/select
  const inputRef = `${field}Input`
  if ($refs[inputRef]) $refs[inputRef].focus()
}

const save = async (field) => {
  try {
    const res = await axios.patch(`/api/order/${props.order.id}`, { [field]: editing[field] })
    props.order[field] = res.data[field]
    emits('updated', props.order)
  } catch (e) {
    console.error(e)
  } finally {
    editing[field] = null
  }
}
</script>

<style scoped>
tr {
  background-color: #cccccc;
}
.odd-row {
  background-color: #ffffff;
}
tr:hover {
  background-color: #e6e6e6;
}
td {
  padding: 0.5rem;
  text-align: center;
  position: relative;
}
.editable-cell input,
.editable-cell select {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  box-sizing: border-box;
  padding: 0.4rem;
  font-size: 1rem;
  border: 1px solid #ccc;
}
</style>
