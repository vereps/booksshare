<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { ILanguage } from '../../../interfaces'
import axios from 'axios'
import Language from './Language.vue'

const languages = ref<ILanguage[]>([])

onMounted(() => {
  axios.get(`http://localhost/languages`).then((res) => {
    languages.value = res.data
  })
})
</script>

<template>
  <div class="row">
    Language:
    <select class="form-select" v-model="languages">
      <option value="">-- Select --</option>
      <option v-for="language in languages" :value="language.code">
        {{ language.name }}
      </option>
    </select>
  </div>
</template>
