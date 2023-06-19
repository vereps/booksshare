<script setup lang="ts">
import { computed } from 'vue'
import type { IBook } from '../../../interfaces'

const props = defineProps<{
  book: IBook
}>()

const emit = defineEmits<{
  (e: 'remove'): void
  (e: 'select'): void
}>()

const book = computed(() => props.book)
const bookUrl = computed(() => `/books/${book.value.id}`)
</script>

<template>
  <tr class="book-list-item">
    <td>
      <book-priority-indicator :priority="book.priority"></book-priority-indicator>
      <router-link :to="bookUrl">{{ book.name }}</router-link>

      <span @click="emit('select')">(edit)</span>
    </td>
    <td>
      <template v-if="book.created_at">{{ book.created_at}}</template>

      <small v-if="!book.created_at" class="text-muted">none</small>
    </td>
    <td>{{ book.is_active ? 'Yes' : 'No' }}</td>
    <td>
      <button class="btn btn-outline-danger book-delete-button" @click="emit('remove')">X</button>
    </td>
  </tr>
</template>

<style lang="scss">
.book-delete-button {
  padding: 0 8px;
  border: none;
  // display: none;
  visibility: hidden;
  font-size: 90%;
}

.book-list-item:hover .book-delete-button {
  visibility: visible;
}
</style>
