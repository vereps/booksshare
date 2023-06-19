import { describe, expect, it, beforeEach } from 'vitest'
import { useAuthStore } from '../stores/auth'
import { Role, type IUser } from '../interfaces'
import { roles } from './roles'
import { createPinia, setActivePinia } from 'pinia'

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

  describe('when user.role is regular', () => {
    beforeEach(() => {
      user.role = Role.regular
    })

    it('isUserAdmin should be false', () => {
      // given
      const { isUserAdmin } = roles()

      // then
      expect(isUserAdmin.value).toEqual(false)
    })

    it('isUserRegular should be true', () => {
      // given
      const { isUserRegular } = roles()

      // then
      expect(isUserRegular.value).toEqual(true)
    })
  })

  describe('when user.role is admin', () => {
    beforeEach(() => {
      user.role = Role.admin
    })

    it('isUserAdmin should be true', () => {
      // given
      const { isUserAdmin } = roles()

      // then
      expect(isUserAdmin.value).toEqual(true)
    })

    it('isUserRegular should be false', () => {
      // given
      const { isUserRegular } = roles()

      // then
      expect(isUserRegular.value).toEqual(false)
    })
  })
})