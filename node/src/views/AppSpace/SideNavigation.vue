<script setup lang="ts">
import { useAuthStore } from '../../stores/auth'
const authStore = useAuthStore()
</script>
<template>
  <nav class="nav flex-column app-space-navigation" v-if="authStore.isLoggedIn">
    <router-link class="nav-link" to="/user/books">Books</router-link>
    <router-link class="nav-link" to="/user/orders">Orders</router-link>
    <router-link class="nav-link" to="/user/profile">Profile</router-link>
  </nav>
</template>

<style lang="scss">
.app-space-navigation {
  background-color: rgba(216, 216, 216, 0.143);

  .nav-link.active {
    font-weight: bold;
  }
}
</style>
