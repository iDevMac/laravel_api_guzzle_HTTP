const Welcome = () => import('./components/Welcome.vue')
const BookList = () => import('./components/books/List.vue')
const BookCreate = () => import('./components/books/Add.vue')
const BookEdit = () => import('./components/books/Edit.vue')


export const routes = [
    {
    name:'home',
    path:'/',
    component: Welcome
},
{
    name:'bookList',
    path:'/book',
    component: BookList
},
{
    name:'bookAdd',
    path:'/book/add',
    component: BookCreate
},
{
    name:'bookEdit',
    path:'/book/:id/edit',
    component: BookEdit
},
]
