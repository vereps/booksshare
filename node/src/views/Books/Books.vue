<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { IBook } from '../../interfaces'
import axios from 'axios'
import Book from './Book.vue'

const books = ref<IBook[]>([])

onMounted(() => {
  axios.get(`http://localhost/books`).then((res) => {
    books.value = res.data
  })
})
</script>

<template>
  <div>
    <div class="row">
      <book v-for="book in books" :book="book"></book>
    </div>
  </div>
</template>
