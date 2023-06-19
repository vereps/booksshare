<script setup lang="ts">
import { inject } from 'vue'

const appName = inject('app-name')
</script>

<template>
  <router-link class="navbar-brand" to="/" data-testid="title">{{
    appName
  }}</router-link>
</template>