<script setup lang="ts">
import { computed } from 'vue'
import type { IBook } from '../../interfaces'
import CONFIG from '../../config.json'

const props = defineProps<{
  book: IBook
}>()
const book = computed(() => props.book)
const bookUrl = computed(() => `/book/${book.value.id}`)

const coverElementStyle = (book: IBook) => ({
  backgroundImage: `url(${CONFIG.api.address}/book/${book?.id}/cover)`
})
</script>

<template>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card" style="width: 18rem">
      
      <img class="book-home-page" v-if="book.has_cover" :style="coverElementStyle(book)" />
      <div class="card-body">
        <h5 class="card-title">{{ book.name }}</h5>
        <p class="card-text col-10 text-truncate">{{ book.description }}</p>
        <router-link :to="bookUrl"> Go details </router-link>
              </div>
    </div>
  </div>
</template>
