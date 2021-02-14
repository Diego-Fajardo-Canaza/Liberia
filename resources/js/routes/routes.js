import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../pages/Home'
import SignIn from '../pages/SignIn'
import SignUp from '../pages/SignUp'
import Dashboard from '../pages/Dashboard'
import Posts from '../pages/Posts'
import CreatePost from '../pages/CreatePost'
 
Vue.use(VueRouter)
const routes =[
    {path:'/',name:'home',component:Home},
    {path:'/signin',name:'signin',component:SignIn},
    {path:'/signup',name:'singup',component:SignUp},
    {path:'/dashboard',name:'dashboard',component:Dashboard, children: 
        [
            {
                path: 'post', 
                name:'dashboard.post',
                component: Posts
            },
            {
                path: 'post-create',
                name:'dashboard.createpost',
                component: CreatePost
            },
        ]
    },
]

const router = new VueRouter({
    mode: 'history', 
    base: process.env.BASE_URL,
    routes,
})

export default router  

