<script setup lang="ts">
import type { IBook } from '../../../interfaces'
import Book from './Book.vue'

const emit = defineEmits<{
  (e: 'removeBook', id: number): void
  (e: 'selectBook', book: IBook): void
}>()

const props = defineProps<{
  books: IBook[]
}>()

const onBookRemove = (id: number) => emit('removeBook', id)
const onBookSelect = (book: IBook) => emit('selectBook', book)
</script>

<template>
  <table class="table" v-if="props.books !== null">
    <thead>
      <tr>
        <th></th>
        <th>Book</th>
        <th>Created</th>
        <th>Completed</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <book
        v-for="book in props.books"
        :book="book"
        @remove="onBookRemove(book.id)"
        @select="onBookSelect(book)"
      ></book>
    </tbody>
  </table>
</template>