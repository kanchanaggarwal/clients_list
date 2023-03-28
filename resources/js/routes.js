const ClientList = () => import('./components/client/List.vue' /* webpackChunkName: "resource/js/components/category/list" */)
const ClientCreate = () => import('./components/client/Add.vue' /* webpackChunkName: "resource/js/components/category/add" */)
const ClientEdit = () => import('./components/client/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const ContactCreate = () => import('./components/contact/Add.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const ContactList = () => import('./components/contact/List.vue' /* webpackChunkName: "resource/js/components/category/edit" */)
const ContactEdit = () => import('./components/contact/Edit.vue' /* webpackChunkName: "resource/js/components/category/edit" */)

export const routes = [
   
    {
        name: 'clientList',
        path: '/',
        component: ClientList
    },
    {
        name: 'clientEdit',
        path: '/client/:id/edit',
        component: ClientEdit
    },
    {
        name: 'clientAdd',
        path: '/client/add',
        component: ClientCreate
    },
    {
        name: 'contactAdd',
        path: '/contact/:id/add',
        component: ContactCreate
    },
    {
        name: 'contactList',
        path: '/contact/:id/list',
        component: ContactList
    },
    {
        name: 'contactEdit',
        path: '/contact/:id/edit',
        component: ContactEdit
    }
]


