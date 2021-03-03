import axios from 'axios'

export default {
    namespaced:true,
    state:{
        comments:[]
    },
    getters:{
        
    },
    mutations:{
       
    },
    actions:{
        
        async createCategory({dispatch},comment){
            console.log('realizando un nuevo comentario')
            console.log(comment)
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/api/comments',comment)
        },
        meComment({commit},data){
            
        }
    }
}