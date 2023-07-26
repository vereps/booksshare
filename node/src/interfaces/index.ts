export type IBook = {
  id: number
  is_active: boolean
  name: string
  cover_filename: string | null
  priority: Priority | null
  description: string | null
  has_cover: boolean
  subject: string | null
  audience: string | null
  author: string | null
  ISBN: string | null
  language: Language
  comment: string | null
  created_at: string | null
  updated_at: string | null
  user_id: number
  last_updated_user_id: number
  language_id: number
}

export type ILanguage = {
  id: number
  name: string
  code: string
  created_at: string | null
  updated_at: string | null
}

export type IPublisher = {
  id: number
  name: string
  description: string
  created_at: string | null
  updated_at: string | null
}

export type IAuthor = {
  id: number
  name: string
  created_at: string | null
  updated_at: string | null
  language_id: number
}

export enum Language {
  Lithuanian = 'Lithuanian',
  English = 'English'
}

export enum Priority {
  high = 'high',
  medium = 'medium',
  low = 'low'
}

export type IUser = {
  id: number
  name: string
  email: string
  email_verified_at: string | null
  has_avatar: boolean
  role: Role
  remember_token: string | null
  created_at: string | null
  updated_at: string | null
  language_id: number
}

export enum Role {
  admin = 'admin',
  regular = 'regular',
  moderator = 'moderator'
}
