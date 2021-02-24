import axios from 'axios'

export default{
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
            console.log('solicitud de las categorias')
            await axios.get('/sanctum/csrf -cookie')
            const ct = await axios.get('/api/categorys')
            return dispatch('meCategory',ct.data)
        },
        meCategory({commit},data){ 
            console.log(data),
            commit('SET_ALL_CATEGORYS',data)
        }
    }
} 