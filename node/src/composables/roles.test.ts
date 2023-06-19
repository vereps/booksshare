import { describe, expect, it, beforeEach } from 'vitest'
import { useAuthStore } from '../stores/auth'
import { Role, type IUser } from '../interfaces'
import { roles } from './roles'
import { createPinia, setActivePinia } from 'pinia'
import type { ComputedRef } from 'vue'

describe('composables/roles', () => {
  const user: IUser = {
    id: 1,
    created_at: '',
    email: '',
    email_verified_at: '',
    has_avatar: false,
    remember_token: '',
    name: '',
    role: Role.regular,
    updated_at: ''
  }

  beforeEach(() => {
    setActivePinia(createPinia())
    const authStore = useAuthStore()
    authStore.user = user
  })

  describe('isUserAdmin', () => {
    const table = [
      [Role.admin, true],
      [Role.regular, false],
      [Role.moderator, false]
    ]

    let isUserAdmin: ComputedRef<boolean>

    beforeEach(() => {
      isUserAdmin = roles().isUserAdmin
    })

    table.map(([role, expected]) =>
      it(`when user.role is ${role} result should be ${expected}`, () => {
        // given
        user.role = role as Role

        // then
        expect(isUserAdmin.value).toEqual(expected)
      })
    )
  })
})