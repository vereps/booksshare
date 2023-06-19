<script setup lang="ts">
import { computed, ref } from 'vue'
import { useAuthStore } from '../../stores/auth'

const authStore = useAuthStore()
const avatarInput = ref<HTMLInputElement>()
const avatarFile = ref<File | null>(null)

const avatarFileEncoded = computed<string | null>(() => {
  if (avatarFile.value) {
    return URL.createObjectURL(avatarFile.value)
  } else {
    return null
  }
})

const handleAvatarChange = (event: any) => {
  if (event.target.files === 0) {
    avatarFile.value = null
  } else {
    avatarFile.value = event.target.files[0]
  }
}

const submit = () => {
  if (!avatarFile.value) return

  const formData = new FormData()
  formData.append('avatar', avatarFile.value)

  authStore.httpClient?.post('/profile/avatar', formData).then(() => {
    if (avatarInput.value) avatarInput.value.value = ''
    avatarFile.value = null

    authStore.reloadUserInfo()
  })
}
</script>

<template>
  <div class="container mt-4"  v-if="authStore.isLoggedIn">
    Profile photo:
    <input type="file" @change="handleAvatarChange" ref="avatarInput" />

    <button
      class="btn btn-outline-success"
      @click="submit"
      :disabled="!avatarFile"
    >
      Upload avatar
    </button>

    <div>
      <img :src="avatarFileEncoded" v-if="avatarFileEncoded" />
    </div>
  </div>
</template>