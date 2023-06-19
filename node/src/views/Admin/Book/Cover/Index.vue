<script setup lang="ts">
import { computed, ref } from 'vue'
import { useAuthStore } from '../../../../stores/auth'

const authStore = useAuthStore()
const coverInput = ref<HTMLInputElement>()
const coverFile = ref<File | null>(null)

const coverFileEncoded = computed<string | null>(() => {
  if (coverFile.value) {
    return URL.createObjectURL(coverFile.value)
  } else {
    return null
  }
})

const handleCoverChange = (event: any) => {
  if (event.target.files === 0) {
    coverFile.value = null
  } else {
    coverFile.value = event.target.files[0]
  }
}

// const submit = () => {
//   if (!coverFile.value) return

//   const formData = new FormData()
//   formData.append('cover', coverFile.value)

//   authStore.httpClient?.post('/cover/cover', formData).then(() => {
//     if (coverInput.value) coverInput.value.value = ''
//     coverFile.value = null

//     authStore.reloadUserInfo()
//   })
// }
</script>

<template>
  <div class="container mt-4"  v-if="authStore.isLoggedIn">
    Cover:
    <input type="file" @change="handleCoverChange" ref="coverInput" />

    <button
      class="btn btn-outline-success"
      @click="submit"
      :disabled="!coverFile"
    >
      Upload cover
    </button>

    <div>
      <img :src="coverFileEncoded" v-if="coverFileEncoded" />
    </div>
  </div>
</template>