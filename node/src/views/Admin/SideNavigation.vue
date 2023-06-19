<script setup lang="ts">
import { roles } from '../../composables/roles'

const { isUserAdmin, isUserRegular } = roles()
</script>

<template>
  <nav class="nav flex-column admin-navigation" v-if="isUserAdmin">
    <router-link class="nav-link" to="/admin">Home</router-link>
    <router-link class="nav-link" to="/admin/users">Users</router-link>
    <router-link class="nav-link" to="/admin/books">Books</router-link>
    <router-link class="nav-link" to="/admin/orders">Orders</router-link>
    <router-link class="nav-link" to="/admin/profile">Profile</router-link>
  </nav>
</template>

<style lang="scss">
.admin-navigation {
  background-color: rgba(216, 216, 216, 0.143);

  .nav-link.active {
    font-weight: bold;
  }
}
</style>
