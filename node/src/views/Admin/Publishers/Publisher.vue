<script setup lang="ts">
import { computed, onMounted, ref } from 'vue'
import type { IBook, ILanguage } from '../../../interfaces'
import CONFIG from '../../../config.json'
import moment from 'moment'
import axios from 'axios'

const props = defineProps<{
  book: IBook
}>()

const emit = defineEmits<{
  (e: 'remove'): void
  (e: 'select'): void
}>()

const book = computed(() => props.book)
const bookUrl = computed(() => `/user/books/${book.value.id}`)

const coverElementStyle = (book: IBook) => ({
  backgroundImage: `url(${CONFIG.api.address}/book/${book?.id}/cover)`
})

const language = ref<ILanguage | null>(null)

onMounted(() => {
  axios.get(`http://localhost/language/${book.value.language_id}`).then((res) => {
    language.value = res.data
  })
})
</script>

<template>
  <tr class="book-list-item">
    <td>
      <router-link :to="bookUrl"
        ><img class="book-cover" v-if="book.has_cover" :style="coverElementStyle(book)"
      /></router-link>
    </td>
    <td>
      {{ book.name }}
    </td>

    <td>
      <span class="d-inline-block text-truncate" style="max-width: 150px">{{
        book.description
      }}</span>
    </td>

    <td>{{ book.author }}</td>

    <td>{{ language?.name }}</td>

    <td>
      <template v-if="book.created_at">{{
        moment(book.created_at).format('YYYY-MM-DD HH:mm:ss')
      }}</template>

      <small v-if="!book.created_at" class="text-muted">none</small>
    </td>

    <td>{{ book.is_active ? 'Yes' : 'No' }}</td>

    <td>
      <button class="btn btn-outline-success book-edit-button" @click="emit('select')">edit</button>
      <!-- <span @click="emit('select')">(edit)</span> -->
    </td>

    <td>
      <button class="btn btn-outline-danger book-delete-button" @click="emit('remove')">
        remove
      </button>
    </td>
  </tr>
</template>

<style lang="scss">
.book-edit-button {
  padding: 0 8px;
  border: none;
  // display: none;
  visibility: visible;
  font-size: 90%;
}

.book-delete-button {
  padding: 0 8px;
  border: none;
  // display: none;
  visibility: hidden;
  font-size: 90%;
}

.book-list-item:hover .book-remove-button {
  visibility: visible;
}
.book-list-item:hover .book-edit-button {
  visibility: visible;
}
</style>
