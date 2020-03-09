import { axiosInstance as axios } from '../../../../js/plugins/axios'

export default {
    getOrderResult ({ commit }, data) {
        return axios.post('/orders/', data)
            .then((res) => {
                commit('setOrderResult', res.data.result);
                return res
            })
    },
    setOrderClientInfo ({ commit }, data) {
        return axios.put(`/orders/${data.id}`, data)
            .then((res) => {
                commit('setOrderResult', res.data.result);
                return res
            })
    }
}
