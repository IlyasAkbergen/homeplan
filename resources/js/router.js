import Vue from 'vue'
import Router from 'vue-router'
import FirstStep from "./pages/FirstStep";
import Layouts from "./pages/Layouts";
import Rooms from "./pages/Rooms";
import Result from "./pages/Result";

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
        },
        {
            path: '/rooms',
            component: Rooms,
        },
        {
            path: '/result',
            component: Result,
        }
    ]
})
