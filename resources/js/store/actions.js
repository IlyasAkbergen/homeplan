import { axiosInstance as axios } from '../../js/plugins/axios'

export default {
    getAllComplexes ({ commit }) {
        return axios.get('/complexes/')
            .then((res) => {
                commit('setAllComplexes', res.data.result);
                return res
            })
    }
}
