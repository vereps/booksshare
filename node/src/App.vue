<script setup lang="ts">
import { onMounted, provide } from 'vue'
import { useAuthStore } from './stores/auth'
import { RouterLink, RouterView } from 'vue-router'
import Navigation from './components/Navigation.vue'
import Footer from './components/Footer.vue'

const authStore = useAuthStore()

onMounted(() => authStore.checkTokenStorage())

provide('app-name', 'BooksShare')
</script>

<template>
  <Navigation />

  <div class="container pt-4">
    <router-view></router-view>
  </div>

  <Footer />
</template>

<style lang="scss">
@use './assets/app.scss';
@use '../node_modules/bootstrap/scss/bootstrap.scss';
</style>
