<script setup lang="ts">
import type { Priority } from '../interfaces'

const props = defineProps<{
  priority: Priority
}>()
</script>

<template>
  <span :class="['book-priority', 'book-priority-' + props.priority]"></span>
</template>

<style lang="scss">
.book-priority {
  display: inline-block;
  width: 16px;
  height: 16px;
  border-radius: 4px;
  margin-right: 4px;
  vertical-align: middle;

  &.book-priority-high {
    background-color: red;
  }
  &.book-priority-medium {
    background-color: rgb(0, 255, 166);
  }
  &.book-priority-low {
    background-color: rgb(175, 194, 187);
  }
}
</style>