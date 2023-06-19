<script setup lang="ts">
import type { IBook } from '../../../interfaces'

// not assigned to const because we're only accessing it in template
defineProps<{
  book: IBook
}>()
</script>

<template>
  <li>ID: {{ book.id }}</li>
  <li>Name: {{ book.name }}</li>
  <li>Created: {{ book.created_at || '-' }}</li>
  <li>Active? - {{ book.is_active ? 'Yes' : 'No' }}</li>
</template>
