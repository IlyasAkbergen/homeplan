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

// plugins
import './plugins/axios'

Vue.config.productionTip = false;

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
