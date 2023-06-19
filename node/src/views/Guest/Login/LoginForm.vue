<script setup lang="ts">
import axios from 'axios'
import { onMounted, reactive, ref } from 'vue'
import { useAuthStore } from '../../../stores/auth'
import { useRouter } from 'vue-router'

const form = reactive({
  email: '',
  password: ''
})
const errors = ref({})
const errorMessage = ref<string | null>(null)
const isBusy = ref(false)
const authStore = useAuthStore()
const router = useRouter()
const emailInputElement = ref<HTMLInputElement | null>(null)

const submit = () => {
  isBusy.value = true

  axios
    .post('http://localhost/login', form)
    .then((res) => {
      authStore.registerToken(res.data.token)
      router.push('/')
    })
    .catch((err) => {
      errorMessage.value = err.response.data.message
      errors.value = err.response.data.errors
    })
    .then(() => (isBusy.value = false))
}

onMounted(() => {
  emailInputElement.value?.focus()
})
</script>

<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Login</h5>

      <template v-if="form">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            class="form-control"
            type="email"
            id="email"
            v-model.trim="form.email"
            ref="emailInputElement"
          />
          <div class="form-text text-danger" v-if="errors.email">
            {{ errors.email.join(' ') }}
          </div>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input class="form-control" type="password" id="password" v-model.trim="form.password" />
          <div class="form-text text-danger" v-if="errors.password">
            {{ errors.password.join(' ') }}
          </div>
        </div>
      </template>

      <div class="mb-3">
        <button
          class="btn btn-outline-success"
          @click="submit"
          :disabled="isBusy"
          data-testid="submit-button"
        >
          <div class="spinner-border spinner-border-sm" v-if="isBusy"></div>
          Login
        </button>
      </div>

      <div class="mb-3" v-if="errorMessage">
        <small class="text-danger">{{ errorMessage }}</small>
      </div>
    </div>
  </div>
</template>
