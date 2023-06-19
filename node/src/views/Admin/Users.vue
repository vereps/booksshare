<script setup lang="ts">
import { computed, onMounted, ref } from 'vue'
import type { IUser } from '../../interfaces'
import { useAuthStore } from '../../stores/auth'
import CONFIG from '../../config.json'

const users = ref<IUser[]>([])
const authStore = useAuthStore()

onMounted(() => {
  authStore.httpClient?.get('/users').then((res) => (users.value = res.data))
})

const avatarElementStyle = (user: IUser) => ({
  backgroundImage: `url(${CONFIG.api.address}/users/${user?.id}/avatar)`
})
</script>

<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="user in users">
          <td>
            <div
              class="avatar"
              v-if="user.has_avatar"
              :style="avatarElementStyle(user)"
            ></div>
          </td>
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>{{ user.role }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>