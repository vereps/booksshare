<script setup lang="ts">
import SideNavigation from './SideNavigation.vue'
</script>

<template>
  <div class="app-space-layout">
    <div class="app-space-navigation">
      <side-navigation></side-navigation>
    </div>
    <div class="app-space-page py-3">
      <div class="container-fluid">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<style lang="scss">
.app-space-layout {
  display: flex;

  .app-space-navigation {
    flex: 0.15;
  }
  .app-space-page {
    flex: 0.85;
  }
}
</style>