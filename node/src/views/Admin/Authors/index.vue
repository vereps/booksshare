<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useAuthorsStore } from '../../../stores/authors'
import AuthorForm from './AuthorForm.vue'
import AuthorList from './AuthorList.vue'
import type { IAuthor } from '../../../interfaces'

const authorsStore = useAuthorsStore()

const selectedAuthor = ref<IAuthor | null>(null)

onMounted(() => authorsStore.ensureAuthorsLoaded())

const onAuthorRemove = (id: number) => authorsStore.removeAuthor(id)
const onAuthorSelect = (author: IAuthor) => (selectedAuthor.value = author)
</script>

<template>
  <div>
    <div>
      <author-form :author="selectedAuthor" @author-created="authorsStore.refreshAuthors()" />
    </div>

    <hr />

    <author-list
      :authors="authorsStore.authors"
      v-if="authorsStore.authors"
      @remove-author="onAuthorRemove"
      @select-author="onAuthorSelect"
    ></author-list>

    <div
      class="spinner-border text-success"
      v-if="authorsStore.isLoading && authorsStore.authors === null"
    >
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</template>
