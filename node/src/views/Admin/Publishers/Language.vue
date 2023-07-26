<script setup lang="ts">
import { computed } from 'vue'
import type { ILanguage } from '../../../interfaces'
import CONFIG from '../../../config.json'

const props = defineProps<{
  language: ILanguage
}>()
const language = computed(() => props.language)
</script>
<template>
  <div class="col-sm-4 mb-3 mb-sm-0">
    <div class="card" style="width: 18rem">
      <div class="card-body">
        <h5 class="card-title">{{ language.name }}</h5>
        <p class="card-text col-10 text-truncate">{{ language.code }}</p>
      </div>
    </div>
  </div>
  <div>
    <!-- <select v-model="Language">
      <option v-for="language in languages" :language="language">
        {{ language.name }}
      </option>
    </select> -->
  </div>
</template>
