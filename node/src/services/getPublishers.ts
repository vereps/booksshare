import axios from 'axios'
import type { IBook } from '../interfaces'
import type { InjectionKey } from 'vue'

export type BooksGetter = () => Promise<IBook[]>

export const getBooksKey = Symbol() as InjectionKey<BooksGetter>

export const getBooks: BooksGetter = (): Promise<IBook[]> =>
  axios.get(`http://localhost/books`).then((res) => res.data)