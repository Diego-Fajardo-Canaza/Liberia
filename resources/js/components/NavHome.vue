<template>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav" v-bind:style="{ 'background-color':color}">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0" v-if="!authenticated">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#inicio" >Inicio</a>
                        </li>
                        <!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>-->
                        <li class="nav-item">
                            <router-link to="/signin" class="nav-link js-scroll-trigger" > inicio de sesion  </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/signup" class="nav-link js-scroll-trigger"> Registro  </router-link>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto my-2 my-lg-0" v-else>
                        <li>
                            <!--<router-link to="/profile" class="nav-link js-scroll-trigger"> <b>Principal |</b> </router-link>-->
                        </li>
                        <li class="nav-item">
                            <router-link to="/profile" class="nav-link js-scroll-trigger"> <b>{{user.name}}</b>| </router-link>
                        </li>
                        <li class="nav-item">
                            <a href="#" @click.prevent="signOut" class="nav-link js-scroll-trigger">  cerrar sesion </a> 
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
</template>
<script>
import {mapGetters ,mapActions} from 'vuex'
export default {
        name:'NavHome',
        props:["color"],
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
        },  
} 
</script>