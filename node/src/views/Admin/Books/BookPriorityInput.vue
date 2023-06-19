<script setup lang="ts">
import { ref, watch } from 'vue'
import { computed } from '@vue/reactivity'
import type { Priority } from '../../../interfaces'

const props = defineProps<{
  modelValue: Priority
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: Priority): void
}>()

const modelValue = computed(() => props.modelValue)
const localModelValue = ref<Priority | null>(null)

watch(modelValue, (newValue) => (localModelValue.value = newValue), {
  immediate: true
})
watch(localModelValue, (newValue) =>
  emit('update:modelValue', newValue as Priority)
)
</script>

<template>
  <div class="form-check mb-3">
    <div>
      <input
        class="form-check-input"
        type="radio"
        value="high"
        id="bookPriorityInputHigh"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="bookPriorityInputHigh">
        <book-priority-indicator priority="high"></book-priority-indicator>
        High priority
      </label>
    </div>

    <div>
      <input
        class="form-check-input"
        type="radio"
        value="medium"
        id="bookPriorityInputMedium"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="bookPriorityInputMedium">
        <book-priority-indicator priority="medium"></book-priority-indicator>
        Medium priority
      </label>
    </div>

    <div>
      <input
        class="form-check-input"
        type="radio"
        value="low"
        id="bookPriorityInputLow"
        v-model="localModelValue"
      />
      <label class="form-check-label" for="bookPriorityInputLow">
        <book-priority-indicator priority="low"></book-priority-indicator>
        Low priority
      </label>
    </div>
    <!-- 
    <div class="form-text text-danger" v-if="errors.is_active">
      {{ errors.is_active.join(' ') }}
    </div> -->
  </div>
</template>