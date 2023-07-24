import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import { createPinia } from 'pinia'
import { createApp } from 'vue'
import App from './App.vue'
import BookPriorityIndicator from './components/BookPriorityIndicator.vue'
import router from './router'
import Card from './components/ui/Card.vue'
import SubmitButton from './components/ui/SubmitButton.vue'
import GuestPage from './components/GuestPage.vue'
import { getBooks, getBooksKey } from './services/getBooks'
import { removeBook, removeBookKey } from './services/removeBook'
import { getAuthors, getAuthorsKey } from './services/getAuthors'
import { removeAuthor, removeAuthorKey } from './services/removeAuthor'

const app = createApp(App)

app.component('BookPriorityIndicator', BookPriorityIndicator)
app.component('DatePicker', VueDatePicker)
app.component('SubmitButton', SubmitButton)
app.component('Card', Card)
app.component('GuestPage', GuestPage)

app.use(createPinia())
app.use(router)

app.provide(getBooksKey, getBooks)
app.provide(removeBookKey, removeBook)

app.provide(getAuthorsKey, getAuthors)
app.provide(removeAuthorKey, removeAuthor)

app.mount('#app')
