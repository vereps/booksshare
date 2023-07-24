<script setup lang="ts">
import { computed } from '@vue/reactivity'
import axios from 'axios'
import { onMounted, reactive, ref, watch } from 'vue'
import type { IAuthor } from '../../../interfaces'
import moment from 'moment'
import AuthorLanguageInput from './AuthorLanguageInput.vue'

const props = defineProps<{
  author: IAuthor | null
}>()

const emit = defineEmits<{
  (e: 'authorCreated'): void
  (e: 'authorUpdated'): void
}>()

const isBusy = ref(false)
const errorMessage = ref<string | null>(null)
const errors = ref({})
const nameInputElement = ref<HTMLInputElement | null>(null)

const form = reactive({
  name: '',
  created_at: '',
  language_id: ''
})

const formNormalized = computed(() => ({
  ...form,
  created_at: form.created_at ? moment(form.created_at).format('YYYY-MM-DD HH:mm:ss') : null
}))

const isEditing = computed(() => props.author !== null)

const resetForm = () => {
  form.name = ''
  form.created_at = ''
  form.language_id = ''
}

const submit = () => {
  isBusy.value = true

  axios
    .post('http://localhost/authors', formNormalized.value)
    .then(() => {
      errorMessage.value = null
      errors.value = {}
      resetForm()
      emit('authorCreated')
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
    .then(() => (isBusy.value = false))
}

watch(
  () => props.author,
  (newValue) => {
    if (newValue === null) {
      resetForm()
    } else {
      form.name = newValue.name
      form.created_at = newValue.created_at || ''
      form.language_id = newValue.language_id
    }
  }
)

onMounted(() => nameInputElement.value?.focus())
</script>

<template>
  <card>
    <template #name>
      {{ isEditing ? 'Edit author' : 'New author' }}
    </template>

    <div class="mb-3">
      <label for="name" class="form-label">Author</label>
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
      <label for="created_at" class="form-label">Created</label>
      <date-picker v-model="form.created_at" format="yyyy-MM-dd HH:mm:ss"></date-picker>
      <div class="form-text text-danger" v-if="errors.created_at">
        {{ errors.created_at.join(' ') }}
      </div>
    </div>
    <div>Language: {{ form.language_id }}</div>
      <author-language-input v-model="form.language_id"></author-language-input>

    <div class="mb-3">
      <submit-button :disabled="isBusy" @click="submit">
        <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
        Create
      </submit-button>
    </div>

    <div class="mb-3" v-if="errorMessage">
      <small class="text-danger">{{ errorMessage }}</small>
    </div>
  </card>
</template>

<style>
.name-display {
  background-color: green;
  color: white;
  white-space: pre;
}
</style>
