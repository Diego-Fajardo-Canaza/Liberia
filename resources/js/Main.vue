<template>
    <div id="myapp">
        <div id="nav">
            <div v-if="!authenticated">
                <router-link to="/signin"> inicio de sesion | </router-link>
                <router-link to="/signup"> Registro | </router-link>
            </div>
            <div v-else>
                <router-link to="/"> Principal | </router-link>
                <router-link to="/profile"> <b>{{user.name}}</b>| </router-link>  
                <a href="#" @click.prevent="signOut">  cerrar sesion </a>     
            </div>
        </div>
        <router-view/>     
    </div>
</template>

<script>
    import {mapGetters ,mapActions} from 'vuex'
    export default {
        name:'Main',
        computed:{
            ...mapGetters({
                authenticated:'auth/authenticated', 
                user:'auth/user',
            })
        },
        methods:{
            ...mapActions({ 
                signOut:'auth/signOut',
            
            }),
            async logout(){
                await this.signOut()
                this.$router.replace({name:'home'})
            }
        }
} 
</script>