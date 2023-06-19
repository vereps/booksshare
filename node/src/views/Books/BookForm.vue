<script setup lang="ts">
import axios from 'axios'
import { computed, reactive, ref } from 'vue'

// const name = ref()
// const created_at = ref<string | null>(null)
// const is_active = ref(true)
const isbn = ref(0)
const description = ref('')

const form = reactive({
  name: '',
  created_at: '',
  is_active: false
})

const formNormalized = computed(() => ({
  ...form,
  created_at: form.created_at || null
}))

const errorMessage = ref<string | null>(null)
const errors = ref({})

const resetForm = () => {
  form.name = ''
  form.created_at = ''
  // form.priority = Priority.low
  form.is_active = false
}

const submit = () => {
  axios
    .post(`http://localhost/book/`, formNormalized.value)
    .then(() => {
      errorMessage.value = null
      errors.value = {}
      resetForm()
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
}

// const roles = ['admin', 'regular', 'moderator']
// const role = ref(roles[0])

// const updateName = () => (name.value += '-')
</script>

<template>
  <div class="card">
    <div class="card-body">
      <!-- <button class="btn" @click="updateName">UpdateName</button> -->

      <div class="mb-3">
        <label for="name" class="form-label">Book</label>
        <input class="form-control" type="text" id="name" v-model.trim="form.name" />
        <div class="form-text text-danger" v-if="errors.name">{{ errors.name.join(' ') }}</div>
      </div>

      <div class="mb-3">
        <label for="created_at" class="form-label">Created</label>
        <input class="form-control" type="text" id="created_at" v-model.trim="form.created_at" />
        <div class="form-text text-danger" v-if="errors.created_at">
          {{ errors.created_at.join(' ') }}
        </div>
      </div>

      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="is_active" v-model="form.is_active" />
        <label class="form-check-label" for="is_active">Is Active</label>
      </div>

      <div class="mb-3">
        <button class="btn btn-outline-success" @click="submit">Create</button>
      </div>

      <div class="mb-3" v-if="errorMessage">
        <small class="text-danger">{{ errorMessage }}</small>
      </div>

      <!-- <input class="form-control" type="text" v-model.number="isbn" /> -->

      <!-- <label>
      Is active
      <input type="checkbox" v-model.number="is_active" />
    </label>

    <div>
      <label>
        Is admin
        <input type="checkbox" true-value="admin" false-value="regular" v-model.number="role" />
      </label>
    </div> -->

      <!-- <div>
      <div v-for="roleType in roles">
        <input type="radio" :value="roleType" v-model="role" />
        <label>{{ roleType.charAt(0).toUpperCase() + roleType.slice(1) }}</label>
      </div>
    </div>

    <select class="form-control" v-model="role">
      <option :value="roleType" v-for="roleType in roles">{{ roleType.charAt(0).toUpperCase() + roleType.slice(1) }}</option>
    </select> -->

      <!-- <textarea class="form-control" rows="3" v-model.trim="description"></textarea> -->

      <!-- <code class="name-display">{{ name }}<br /></code>
    <code class="name-display">{{ isbn }}<br /></code>
    <code class="name-display">{{ description }}</code> -->
    </div>
  </div>
</template>

<style>
.name-display {
  background-color: greenyellow;
  color: black;
  white-space: pre;
}
</style>
