import Vue from 'vue'
import Vuex from 'vuex'
import auth from './auth'
import post from './post'
import category from './category'
import comment from './comment'

Vue.use(Vuex)
export default new Vuex.Store({
    modules:{
        auth,
        post,
        category,
        comment,
        //aqui van  los demas modulos   
    }
}) 