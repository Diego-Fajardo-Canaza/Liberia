import axios from 'axios'

export default{
    namespaced:true,
    state:{
        authenticated:false,
        user:null
    },
    getters:{
        authenticated(state){
        return state.authenticated  
        },
        user(state){
            return state.user
        }
    },
    mutations:{
        SET_AUTHENTICATED(state,value){
            state.authenticated=value
        },
        SET_USER(state,value){
            state.user = value  
        },
    },
    actions:{
        async IniciarSesion({dispatch},crendetials){ 
            console.log(crendetials)
            console.log('reciviendo formulario y enviando a backend')
            await axios.get('/sanctum/csrf-cookie')
            await axios.post('/login',crendetials)
            return dispatch('me')
        }, 
        async signUp({dispatch},userRegister){
            await axios.post('/register',userRegister)
            return dispatch('me')
        },
        async signOut({dispatch}){
            await axios.post('/logout')
            return dispatch('me')   
        },
        me({commit}){
            console.log('into!!!')
            return axios.get('/api/user').then((response)=>{
                commit ('SET_AUTHENTICATED',true)
                commit ('SET_USER',response.data)
            }).catch(()=>{
                commit ('SET_AUTHENTICATED',false)
                commit ('SET_USER',null)
            })
        }
    },
}