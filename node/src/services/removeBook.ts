import axios from 'axios'
import type { InjectionKey } from 'vue'

export type BookRemover = (id: number) => Promise<any>

export const removeBookKey = Symbol() as InjectionKey<BookRemover>

export const removeBook: BookRemover = (id) =>
  axios.delete(`http://localhost/books/${id}`)