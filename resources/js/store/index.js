import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
import post from './post'
import category from './category'

Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        auth,
        post,
        category,
        //aqui van  los demas modulos   
    }
}) 