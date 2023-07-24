import axios from 'axios'
import type { IAuthor } from '../interfaces'
import type { InjectionKey } from 'vue'

export type AuthorsGetter = () => Promise<IAuthor[]>

export const getAuthorsKey = Symbol() as InjectionKey<AuthorsGetter>

export const getAuthors: AuthorsGetter = (): Promise<IAuthor[]> =>
  axios.get(`http://localhost/authors`).then((res) => res.data)