import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../pages/Home'
import SignIn from '../pages/SignIn'
import SignUp from '../pages/SignUp'
import Dashboard from '../pages/Dashboard'
import Posts from '../pages/Posts'
import CreatePost from '../pages/CreatePost'
import UserPosts from '../pages/UserPosts'
import DetailPost from '../pages/DetailPost'
import EditPost from '../pages/EditPost'
 
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
            {
                path: 'user-post',
                name:'dashboard.userpost',
                component: UserPosts
            },
            {
                path: 'detail-post/:slug',
                name:'dashboard.detailpost',
                component: DetailPost
            },
            {
                path:'edit-post/:slug',
                name:'dashboard.editpost',
                component: EditPost
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

