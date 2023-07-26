<script setup lang="ts">
import type { IBook } from '../../../interfaces'
import Book from './Publisher.vue'

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
        <th>Cover</th>
        <th>Book name</th>
        <th>Book description</th>
        <th>Author</th>
        <th>Language</th>
        <th>Created</th>
        <th>Active</th>
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