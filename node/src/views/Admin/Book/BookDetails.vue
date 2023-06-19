<script setup lang="ts">
import type { IBook } from '../../../interfaces'
import CONFIG from '../../../config.json'
import Cover from './Cover/Index.vue'

// not assigned to const because we're only accessing it in template
defineProps<{
  book: IBook
}>()

const coverElementStyle = (book: IBook) => ({
  backgroundImage: `url(${CONFIG.api.address}/book/${book?.id}/cover)`
})
</script>

<template>
  <div class="book-cover" v-if="book.has_cover" :style="coverElementStyle(book)"></div>
  <li>ID: {{ book.id }}</li>
  <li>Name: {{ book.name }}</li>
  <li>Created: {{ book.created_at || '-' }}</li>
  <li>Active? - {{ book.is_active ? 'Yes' : 'No' }}</li>
  <cover></cover>
</template>
