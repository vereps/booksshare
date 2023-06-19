<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useBooksStore } from '../../../stores/books'
import BookForm from './BookForm.vue'
import BookList from './BookList.vue'
import type { IBook } from '../../../interfaces'

const booksStore = useBooksStore()

const selectedBook = ref<IBook | null>(null)

onMounted(() => booksStore.ensureBooksLoaded())

const onBookRemove = (id: number) => booksStore.removeBook(id)
const onBookSelect = (book: IBook) => (selectedBook.value = book)
</script>

<template>
  <div>
    <div>
      <book-form
        :book="selectedBook"
        @book-created="booksStore.refreshBooks()"
      />
    </div>

    <hr />

    <book-list
      :books="booksStore.books"
      v-if="booksStore.books"
      @remove-book="onBookRemove"
      @select-book="onBookSelect"
    ></book-list>

    <div
      class="spinner-border text-success"
      v-if="booksStore.isLoading && booksStore.books === null"
    >
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</template>