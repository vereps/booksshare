<script setup lang="ts">
import Navigation from '../../components/Navigation.vue'
</script>

<template>
  <Navigation />

  <div class="container pt-4">
    <slot></slot>
  </div>
</template>
