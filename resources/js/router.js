import Vue from 'vue'
import Router from 'vue-router'
import FirstStep from "./pages/FirstStep";
import Layouts from "./pages/Layouts";

Vue.use(Router);

export default new Router({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: FirstStep,
        },
        {
            path: '/layouts',
            component: Layouts,
        }
    ]
})
