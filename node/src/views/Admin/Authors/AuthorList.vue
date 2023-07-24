<script setup lang="ts">
import type { IAuthor } from '../../../interfaces'
import Author from './Author.vue'

const emit = defineEmits<{
  (e: 'removeAuthor', id: number): void
  (e: 'selectAuthor', author: IAuthor): void
}>()

const props = defineProps<{
  authors: IAuthor[]
}>()

const onAuthorRemove = (id: number) => emit('removeAuthor', id)
const onAuthorSelect = (author: IAuthor) => emit('selectAuthor', author)
</script>

<template>
    <table class="table" v-if="props.authors !== null">
    <thead>
      <tr>
        <th></th>
        <th>Author</th>
        <th>Created</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <author
        v-for="author in props.authors"
        :author="author"
        @remove="onAuthorRemove(author.id)"
        @select="onAuthorSelect(author)"
      ></author>
    </tbody>
  </table>
</template>