import { defineStore } from 'pinia'
import { inject, ref } from 'vue'
import type { IBook } from '../interfaces'
import { getBooksKey, type BooksGetter } from '../services/getBooks'
import { removeBookKey, type BookRemover } from '../services/removeBook'

export const useBooksStore = defineStore('books', () => {
  const books = ref<IBook[] | null>(null)
  const isLoading = ref(false)
  const getBooks = inject(getBooksKey) as BooksGetter
  const removeBookApi = inject(removeBookKey) as BookRemover

  const refreshBooks = () => {
    isLoading.value = true

    getBooks().then((apiBooks) => {
      books.value = apiBooks
      isLoading.value = false
    })
  }

  const ensureBooksLoaded = () => {
    if (books.value === null) {
      refreshBooks()
    }
  }

  const removeBook = (id: number) => removeBookApi(id).then(() => refreshBooks())

  return {
    books,
    isLoading,
    refreshBooks,
    ensureBooksLoaded,
    removeBook
  }
})
