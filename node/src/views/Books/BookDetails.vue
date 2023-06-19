<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { IBook } from '../../interfaces'
import axios from 'axios'
import CONFIG from '../../config.json'

const props = defineProps<{
  id: string
}>()

const book = ref<IBook | null>(null)

onMounted(() => {
  axios.get(`http://localhost/book/${props.id}`).then((res) => {
    book.value = res.data
  })
})

const coverElementStyle = (book: IBook) => ({
  backgroundImage: `url(${CONFIG.api.address}/book/${book?.id}/cover)`
})
</script>

<template>
  <div v-if="book !== null" class="container">
    <div class="col-sm-4 mb-3 mb-sm-0">
      <div class="card" style="width: 18rem">
        <img class="book-home-page" v-if="book.has_cover" :style="coverElementStyle(book)" />
        <div class="card-body">
          <h5 class="card-title">{{ book.name }}</h5>
          <p class="card-text col-10 text-truncate">{{ book.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>
