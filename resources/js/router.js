import Vue from 'vue'
import Router from 'vue-router'
import FirstStep from "./pages/FirstStep";
import Layouts from "./pages/Layouts";
import Rooms from "./pages/Rooms";
import Result from "./pages/Result";
import CustomApartment from "./pages/CustomApartment";
import CustomRoomTypes from  "./pages/CustomRoomTypes";
import SuccessOrder from "./components/SuccessOrder";

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
        },
        {
            path: '/custom-apartment',
            component: CustomApartment,
        },
        {
            path: '/custom-room-types',
            component: CustomRoomTypes,
        },
        {
            path: '/success-order',
            component: SuccessOrder,
        }
    ]
})
