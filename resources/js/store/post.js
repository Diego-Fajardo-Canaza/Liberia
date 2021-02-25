import axios from 'axios'

export default {
    namespaced:true,
    state:{
       allposts:[],
       allpostsuser:[],
       detailpost:{} 
    },
    getters:{
        reponsePosts(state){
            return state.allposts
        },
        get_posts_user(state){
            return state.allpostsuser
        },
        detail_post(state){
            return state.detailpost
        }
    },
    mutations:{
        SET_ALL_POSTS(state,value){
            state.allposts = value
        },
        SET_ALL_POSTS_USER(state,value){
            state.allpostsuser = value
        },
        SET_DETAIL_POST(state,value){
            state.detailpost = value
        },
    },
    actions:{
        async getAllPost({dispatch}){
            console.log('solicitando todas las publicaciones')
            await axios.get('/sanctum/csrf-cookie')
            let gp = await axios.get('/api/posts')
            const data ={
                type:'allpost',
                data:gp.data  
            }
            return dispatch('mePosts',data)
        },
        async createPost({dispatch},data){
            console.log('enviando informacion de la nueva publicacion')
            console.log(data)
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/api/posts',data.formdata,data.config)
            //return dispatch('mePosts',gp.data)
        },
        async getAllPostUser({dispatch}){
            console.log('solicitando todas las publicaciones del usuario')
            await axios.get('/sanctum/csrf-cookie')
            let gpu = await axios.get('/api/post/user-posts')
            console.log(gpu)
            const data = {
                type:'postuser',
                data:gpu.data
            }
            return dispatch('mePosts',data)
        },
        async detailPost({dispatch},parameter){
            console.log('solicitando el detalle de la publicacion') 
            console.log(parameter)
            await axios.get('/sanctum/csrf-cookie')
            let detail = await axios.get('/api/posts/'+parameter)
            //let detail = await axios.get(`/api/posts/${parameter}`)
            const data = {
                type:'detailpost',
                data:detail.data
            }
            return dispatch('mePosts',data)
        },
        async editPost({dispatch},data){
            console.log(data)
            console.log('actualizando publicacion')
            await axios.get('/sanctum/csrf-cookie')
            await axios.post(`/api/posts/${data.parameter}`,data.formdata,data.config) // metodo de modelo controlador de laravel por defecto 
            //let edit = await axios.post('/api/post/update-my-post',data.formdata,data.config)//mi propio metodo de actualizacion 
        },   
        async deletePost({dispatch},parameter){
            console.log(parameter)
            console.log('eliminando publicacion')
            await axios.get('/sanctum/csrf-cookie')
            await axios.delete(`/api/posts/${parameter}`).then((response)=>{
                dispatch('getAllPostUser')
            }).catch((error)=>{
                alert(error)
            })
        },
        mePosts({commit},data){
            //console.log(getAllPost)
            //commit('SET_ALL_POSTS',getAllPost)

            switch (data.type) {
                case 'postuser':
                    commit('SET_ALL_POSTS_USER',data.data)
                    break;
                case 'allpost':
                    commit('SET_ALL_POSTS',data.data)
                    break;
                case 'detailpost':
                    console.log(data.data)
                    commit('SET_DETAIL_POST',data.data)
                    break;
                default:
                    break;
            }
        }
    }
}