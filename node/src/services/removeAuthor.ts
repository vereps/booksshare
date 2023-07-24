import axios from 'axios'
import type { InjectionKey } from 'vue'

export type AuthorRemover = (id: number) => Promise<any>

export const removeAuthorKey = Symbol() as InjectionKey<AuthorRemover>

export const removeAuthor: AuthorRemover = (id) =>
  axios.delete(`http://localhost/author/${id}`)