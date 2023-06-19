<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { IBook } from '../../../interfaces'
import axios from 'axios'
import BookDetails from './BookDetails.vue'

const props = defineProps<{
  id: string
}>()

const book = ref<IBook | null>(null)

onMounted(() => {
  axios.get(`http://localhost/book/${props.id}`).then((res) => {
    book.value = res.data
  })
})
</script>

<template>
  <div class="container">
    <div v-if="book !== null">
      <ul>
        <book-details :book="book"></book-details>
      </ul>
    </div>
  </div>
</template>