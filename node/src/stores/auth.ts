import type { AxiosInstance } from 'axios'
import axios from 'axios'
import { defineStore } from 'pinia'
import { computed, ref } from 'vue'
import type { IUser } from '../interfaces'
import CONFIG from '../config.json'

const LOCALSTORAGE_TOKEN_KEY = 'auth:token'

export const useAuthStore = defineStore('auth', () => {
  const httpClient = ref<AxiosInstance | null>(null)
  const user = ref<IUser | null>(null)

  const isLoggedIn = computed(() => user.value !== null)

  const loadHttpClient = () => {
    const token = window.localStorage.getItem(LOCALSTORAGE_TOKEN_KEY)

    httpClient.value = axios.create({
      baseURL: CONFIG.api.address,
      headers: {
        Authorization: `Bearer ${token}`
      }
    })

    reloadUserInfo()
  }

  const registerToken = (token: string) => {
    window.localStorage.setItem(LOCALSTORAGE_TOKEN_KEY, token)

    loadHttpClient()
  }

  const checkTokenStorage = () => {
    const token = window.localStorage.getItem(LOCALSTORAGE_TOKEN_KEY)

    if (token !== null) loadHttpClient()
  }

  const reloadUserInfo = () =>
    httpClient.value?.get('/auth/me').then((res) => (user.value = res.data))

  const logout = () => {
    window.localStorage.removeItem(LOCALSTORAGE_TOKEN_KEY)
    httpClient.value = null
    user.value = null
  }

  return {
    httpClient,
    user,
    isLoggedIn,
    registerToken,
    checkTokenStorage,
    reloadUserInfo,
    logout
  }
})
