import axios from 'axios'

export default {
    namespaced:true,
    state:{
        allcategorys:[]
    },
    getters:{
        get_all_categorys(state){
            return state.allcategorys
        }
    },
    mutations:{
       SET_ALL_CATEGORYS(state,value){
            state.allcategorys = value
       }
    },
    actions:{
        async getCategorysAll({dispatch}){
            console.log('solicitando todas las categorias')
            await axios.get('/sanctum/csrf-cookie')
            const ct = await axios.get('/api/categorys')
            return dispatch('meCategory',ct.data)
        },
        async createCategory({dispatch},newCategory){
            console.log('solicitando la creacion de una nueva categoria')
            console.log(newCategory)
            await axios.get('/sanctum/csrf-cookie') 
            await axios.post('/api/categorys',newCategory)
        },
        meCategory({commit},data){
            console.log(data)
            commit('SET_ALL_CATEGORYS',data)
        }
    }
}