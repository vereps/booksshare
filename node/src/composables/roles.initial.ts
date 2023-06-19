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

  it('isUserAdmin should be false when user.role is regular', () => {
    // given
    user.role = Role.regular
    const { isUserAdmin } = roles()

    // then
    expect(isUserAdmin.value).toEqual(false)
  })

  it('isUserAdmin should be true when user.role is admin', () => {
    // given
    user.role = Role.admin
    const { isUserAdmin } = roles()

    // then
    expect(isUserAdmin.value).toEqual(true)
  })

  it('isUserRegular should be false when user.role is admin', () => {
    // given
    user.role = Role.admin
    const { isUserRegular } = roles()

    // then
    expect(isUserRegular.value).toEqual(false)
  })

  it('isUserRegular should be true when user.role is regular', () => {
    // given
    user.role = Role.regular
    const { isUserRegular } = roles()

    // then
    expect(isUserRegular.value).toEqual(true)
  })
})
