import axios from 'axios'

export default {
    namespaced:true,
    state: {
        allposts:[]
    },
    getters: {
        reponsePosts(state) {
            return state.allposts
        },
    },
    mutations: {
        SET_ALL_POSTS(state,value) {
            state.allposts = value
        },
    },
    actions: {
        async getAllPost({dispatch}) {
            console.log('Solicitando todas las publicaciones')
            await axios.get('/sanctum/csrf-cookie')
            let gp = await axios.get('/api/posts')
            return dispatch('mePosts',gp.data)
        },
        async createPost({dispatch},data){
            console.log('enviando informacion de la nueva publicacion')
            console.log(data)
            await axios.get('/sanctum/csrf-cookie')
            let gp = await axios.post('/api/posts',data.formdata,data.config) 
            //return dispatch('mePosts',gp.data)
        },
        mePosts({commit},getAllPost) {
            commit('SET_ALL_POSTS',getAllPost)
        }
    }
}