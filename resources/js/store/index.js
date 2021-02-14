import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
import post from './post'
Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        auth,
        post
        //aqui van  los demas modulos   
    }
}) 