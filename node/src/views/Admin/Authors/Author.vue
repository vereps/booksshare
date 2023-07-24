<script setup lang="ts">
import { computed } from 'vue'
import type { IAuthor } from '../../../interfaces'
import BookLanguageInput from './BookLanguageInput.vue'

const props = defineProps<{
  author: IAuthor
}>()

const emit = defineEmits<{
  (e: 'remove'): void
  (e: 'select'): void
}>()

const author = computed(() => props.author)
</script>

<template>
  <tr class="author-list-item">
    <td>
      <span @click="emit('select')">(edit)</span>
    </td>
    <td>
      <template v-if="author.name">{{ author.name }}</template>

      <small v-if="!author.name" class="text-muted">none</small>
    </td>
    <td>
      <button class="btn btn-outline-danger author-delete-button" @click="emit('remove')">X</button>
    </td>
  </tr>
</template>

<style lang="scss">
.author-delete-button {
  padding: 0 8px;
  border: none;
  // display: none;
  visibility: visible;
  font-size: 90%;
}

.author-list-item:hover .author-delete-button {
  visibility: visible;
}
</style>
