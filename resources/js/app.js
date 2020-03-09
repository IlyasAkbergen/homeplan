//
// require('./bootstrap');
//
// window.Vue = require('vue');
//
// import Vue from 'vue'
// import App from './App.vue'
// import router from './router'
// import store from '@/store'
//
// // const files = require.context('./', true, /\.vue$/i)
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
//
// Vue.component('app', require('./App.vue').default);
//
//
// const app = new Vue({
//     el: '#app',
// });

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from "./store";
import VueMask from 'v-mask'
import { ValidationProvider, extend } from 'vee-validate';
import { required, min } from 'vee-validate/dist/rules';

// plugins
import './plugins/axios'

Vue.use(VueMask);
Vue.component('ValidationProvider', ValidationProvider);

// Add the required rule
// extend('required', required);
// extend('min', min);

Vue.config.productionTip = false;

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
