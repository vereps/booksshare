<script setup lang="ts">
import { computed } from '@vue/reactivity'
import axios from 'axios'
import { onMounted, reactive, ref, watch } from 'vue'
// import BookPriorityInput from './BookPriorityInput.vue'
// import { Priority, type IBook } from '../../../interfaces'

import BookLanguageInput from './PublisherLanguageInput.vue'

import moment from 'moment'
import type { IBook } from '@/interfaces'

const props = defineProps<{
  book: IBook | null
}>()

const emit = defineEmits<{
  (e: 'bookCreated'): void
  (e: 'bookUpdated'): void
}>()

const isBusy = ref(false)
const errorMessage = ref<string | null>(null)
const errors = ref({})
const nameInputElement = ref<HTMLInputElement | null>(null)

const form = reactive({
  name: '',
  description: '',
  language: '',
  created_at: '',
  // priority: Priority.low,
  is_active: false
})

const formNormalized = computed(() => ({
  ...form,
  created_at: form.created_at ? moment(form.created_at).format('YYYY-MM-DD HH:mm:ss') : null
}))

const isEditing = computed(() => props.book !== null)

const resetForm = () => {
  form.name = ''
  form.description = ''
  form.language = ''
  form.created_at = ''
  // form.priority = Priority.low
  form.is_active = false
}

const submit = () => {
  isBusy.value = true

  axios
    .post('http://localhost/books', formNormalized.value)
    .then(() => {
      errorMessage.value = null
      errors.value = {}
      resetForm()
      emit('bookCreated')
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
    .then(() => (isBusy.value = false))
}
const update = () => {
  isBusy.value = true

  axios
    .post(`http://localhost/books/${props.book.id}`, formNormalized.value)
    .then(() => {
      errorMessage.value = null
      errors.value = {}
      resetForm()
      emit('bookUpdated')
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
    .then(() => (isBusy.value = false))
}

watch(
  () => props.book,
  (newValue) => {
    if (newValue === null) {
      resetForm()
    } else {
      form.name = newValue.name
      form.description = newValue.description || ''
      form.language = newValue.language
      form.created_at = newValue.created_at || ''
      // form.priority = newValue.priority
      form.is_active = newValue.is_active
    }
  }
)

onMounted(() => nameInputElement.value?.focus())
</script>

<!-- https://bootstrap-vue.org/docs/components/form/#form -->
<template>
  <div>
    <card>
      <template #name>
        {{ isEditing ? 'Edit book' : 'New book' }}
      </template>

      <div class="mb-3">
        <label for="name" class="form-label">Book name</label>
        <input
          class="form-control"
          type="text"
          id="name"
          v-model.trim="form.name"
          ref="nameInputElement"
        />
        <div class="form-text text-danger" v-if="errors.name">
          {{ errors.name.join(' ') }}
        </div>
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Book description</label>
        <textarea
          class="form-control"
          type="text"
          id="description"
          v-model.trim="form.description"
          ref=""
        />
        <div class="form-text text-danger" v-if="errors.description">
          {{ errors.description.join(' ') }}
        </div>
      </div>

      <!-- <div class="mb-3">
      <label for="created_at" class="form-label">Created</label>
      <date-picker v-model="form.created_at" format="yyyy-MM-dd HH:mm:ss"></date-picker>
      <div class="form-text text-danger" v-if="errors.created_at">
        {{ errors.created_at.join(' ') }}
      </div>
    </div> -->

      <!-- <book-priority-input v-model="form.priority"></book-priority-input> -->
      <div>Language: {{ form.language }}</div>
      <book-language-input v-model="form.language"></book-language-input>

      <div class="form-check mb-3">
        <input
          class="form-check-input"
          type="checkbox"
          id="is_active"
          v-model="form.is_active"
          ref=""
        />
        <label class="form-check-label" for="is_active">Completed</label>
        <div class="form-text text-danger" v-if="errors.is_active">
          {{ errors.is_active.join(' ') }}
        </div>
      </div>

      <div class="mb-3">
        <submit-button :disabled="isBusy" variant="primary" @click="submit">
          <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
          Create
        </submit-button>

        <submit-button :disabled="isBusy" variant="primary" @click="update">
          <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
          Update
        </submit-button>
        <submit-button :disabled="isBusy" type="reset" variant="danger" @click="resetForm">
          <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
          Reset
        </submit-button>
      </div>

      <div class="mb-3" v-if="errorMessage">
        <small class="text-danger">{{ errorMessage }}</small>
      </div>
    </card>
  </div>
</template>

<style lang="scss">
@use '../../../assets/app.scss';
@use '../../../../node_modules/bootstrap/scss/bootstrap.scss';
.name-display {
  background-color: green;
  color: white;
  white-space: pre;
}
</style>
