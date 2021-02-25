require('./bootstrap');
import Vue from 'vue'
import Main from './Main'
import router from './routes/routes'
import store from './store'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);

store.dispatch('auth/me').then(()=>{
    new Vue({
        router,
        store,
        render:h=>h(Main) 
    }).$mount('#app')
})
