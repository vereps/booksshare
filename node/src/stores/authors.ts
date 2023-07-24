import { defineStore } from 'pinia'
import { inject, ref } from 'vue'
import type { IAuthor } from '../interfaces'
import { getAuthorsKey, type AuthorsGetter } from '../services/getAuthors'
import { removeAuthorKey, type AuthorRemover } from '../services/removeAuthor'

export const useAuthorsStore = defineStore('authors', () => {
  const authors = ref<IAuthor[] | null>(null)
  const isLoading = ref(false)
  const getAuthors = inject(getAuthorsKey) as AuthorsGetter
  const removeAuthorApi = inject(removeAuthorKey) as AuthorRemover

  const refreshAuthors = () => {
    isLoading.value = true

    getAuthors().then((apiAuthors) => {
      authors.value = apiAuthors
      isLoading.value = false
    })
  }

  const ensureAuthorsLoaded = () => {
    if (authors.value === null) {
      refreshAuthors()
    }
  }

  const removeAuthor = (id: number) => removeAuthorApi(id).then(() => refreshAuthors())

  return {
    authors,
    isLoading,
    refreshAuthors,
    ensureAuthorsLoaded,
    removeAuthor
  }
})
