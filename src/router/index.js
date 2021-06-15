import { createRouter, createWebHistory } from '@ionic/vue-router';
import Tab from '../views/Tab.vue';

const routes=[
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/',
    name: 'Home',
    component: Tab,
    children: [
      {
        path: '',
        redirect: 'home'
      },
      {
        name: 'home',
        path: 'home',
        component: () => import('../views/Home')
      },
      {
        name: 'servicos',
        path: 'servicos',
        component: () => import('../views/Servicos')
      },
      {
        name: 'ajustes',
        path: 'ajustes',
        component: () => import('../views/Servicos')
      },
      {
        name: 'ajuda',
        path: 'ajuda',
        component: () => import('../views/Servicos')
      },
      {
        name: 'barbeiros',
        path: 'barbeiros/:id?/:nomeserv?',
        component: () => import('../views/Barbeiros'),
        props: (route) => ({ nomeserv: (route.params.nomeserv), id: parseInt(route.params.id)})
      }
    ]
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
