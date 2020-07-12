import Vue from 'vue'
import Router from 'vue-router'
import MainCal from '../components/MainCal/MainCal';
import UserList from '../components/UserList/UserList';
import Authorization from '../components/Authorization/Authorization';

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/calendar',
      name: 'MainCal',
      component: MainCal
    },
    {
      path: '/login',
      name: 'Authorization',
      component: Authorization
    },
    {
      path: '/new-event',
      name: 'NewEvent',
      component: MainCal,
      props: { default: false, showEventInputDialog: true }
    },
    {
      path: '/user-list',
      name: 'UserList',
      component: UserList

    },
    {
      path: '/new-user',
      name: 'NewUser',
      component: MainCal,
      props: { default: false, showUserInputDialog: true }
    }
  ]
})
