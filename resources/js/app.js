require('./bootstrap');
import Vue from 'vue'
import Main from './Main'
import router from './routes/routes'
import store from './store'
store.dispatch('auth/me').then(()=>{
    new Vue({
        router,
        store,
        render:h=>h(Main) 
    }).$mount('#app')
})/*.catch(()=>{
    console.log('NO INICIO SESION')
})*/