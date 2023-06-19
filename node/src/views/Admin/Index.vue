<script setup lang="ts">
import SideNavigation from './SideNavigation.vue'
</script>

<template>
  <div class="admin-layout">
    <div class="admin-navigation">
      <side-navigation></side-navigation>
    </div>
    <div class="admin-page py-3">
      <div class="container-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.admin-layout {
  display: flex;

  .admin-navigation {
    flex: 0.15;
  }
  .admin-page {
    flex: 0.85;
  }
}
</style>