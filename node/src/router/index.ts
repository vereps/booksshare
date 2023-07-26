import { createRouter, createWebHistory } from 'vue-router'


import Books from '../views/Books/Books.vue'
import Book from '../views/Books/BookDetails.vue'


import Home from '../views/Guest/Home/Index.vue'
import Login from '../views/Guest/Login/Index.vue'
// import About from '../views/Guest/About.vue'
import About from '../views/AppSpace/Books/Languages.vue'


import AppSpace from '../views/AppSpace/Index.vue'
import UserBooks from '../views/AppSpace/Books/Index.vue'
import UserBook from '../views/AppSpace/Book/Index.vue'

import Admin from '../views/Admin/Index.vue'
import AdminHome from '../views/Admin/Home.vue'
import AdminUsers from '../views/Admin/Users.vue'
import AdminBooks from '../views/Admin/Books/Index.vue'
import AdminBook from '../views/Admin/Book/Index.vue'
import AdminOrders from '../views/Admin/Orders/index.vue'
import AdminAuthors from '../views/Admin/Authors/index.vue'
import AdminPublishers from '../views/Admin/Publishers/index.vue'

import Profile from '../views/Profile/Index.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Books
    },
    {
      path: '/login',
      component: Login
    },
    {
      path: '/about',
      component: About
    },

    {
      path: '/books',
      name: 'books',
      component: Books
    },
    {
      path: '/book/:id',
      name: 'book',
      component: Book,
      props: true
    },

    {
      path: '/user',
      component: AppSpace,
      children: [
        {
          path: '',
          component: About
        },
        {
          path: '/user/books',
          component: UserBooks
        },
        {
          path: '/user/books/:id',
          component: UserBook,
          props: true
        },
        {
          path: '/user/profile',
          component: Profile
        }
      ]
    },

    {
      path: '/admin',
      component: Admin,
      children: [
        {
          path: '',
          component: AdminHome
        },
        {
          path: 'users',
          component: AdminUsers
        },
        {
          path: '/admin/books',
          component: AdminBooks
        },
        {
          path: '/admin/book/:id',
          component: AdminBook,
          props: true
        },
        {
          path: '/admin/orders',
          component: AdminOrders
        },
        {
          path: '/admin/authors',
          component: AdminAuthors
        },
        {
          path: '/admin/publishers',
          component: AdminPublishers
        },
        {
          path: '/admin/profile',
          component: Profile
        }
      ]
    }
  ],
  linkActiveClass: 'active',
  linkExactActiveClass: 'active'
})

export default router
