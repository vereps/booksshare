import { computed } from 'vue'
import { useAuthStore } from '../stores/auth'
import { Role } from '../interfaces'

export const roles = () => {
  const authStore = useAuthStore()

  const isUserAdmin = computed<boolean>(
    () => authStore.user?.role === Role.admin
  )
  const isUserRegular = computed<boolean>(
    () => authStore.user?.role === Role.regular
  )
  const isUserModerator = computed<boolean>(
    () => authStore.user?.role === Role.moderator
  )

  return {
    isUserAdmin,
    isUserRegular,
    isUserModerator
  }
}