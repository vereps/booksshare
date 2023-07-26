<script setup lang="ts">
import { onMounted, ref, watch } from 'vue'
import { computed } from '@vue/reactivity'
import type { ILanguage } from '@/interfaces'
import axios from 'axios'

const props = defineProps<{
  modelValue: ILanguage
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: ILanguage): void
}>()

const modelValue = computed(() => props.modelValue)
const localModelValue = ref<ILanguage | null>(null)

watch(modelValue, (newValue) => (localModelValue.value = newValue), {
  immediate: true
})

watch(localModelValue, (newValue) => emit('update:modelValue', newValue as ILanguage))
// ---------------------------
const languages = ref<ILanguage[]>([])

onMounted(() => {
  axios.get(`http://localhost/languages`).then((res) => {
    languages.value = res.data
  })
})
</script>

<template>
  <div class="row">
    <select class="form-select" v-model="localModelValue">
      <option value="">-- Select language --</option>
      <option v-for="language in languages" :value="language.name">
        {{ language.name }}
      </option>
    </select>
  </div>
</template>
