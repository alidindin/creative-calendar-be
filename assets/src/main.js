import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import 'es6-promise/auto'
import store from './store'
import router from './router';

Vue.config.productionTip = false

new Vue({
  vuetify,
  store,
  router,
  render: h => h(App)
}).$mount('#app')
