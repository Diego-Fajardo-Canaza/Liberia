<!--<template>
    <div id="myapp">
        <div id="nav">
            <div v-if="!authenticated">
                <router-link to="/signin">Inicio de Sesion | </router-link>
                <router-link to="/signup">Registro | </router-link>
            </div>
            <div v-else>
                <router-link to="/">Principal| </router-link>
                <router-link to="/profile"><b>{{user.name}}</b> | </router-link>
                <a href="#" @click.prevent="logout">Cerrar Session</a>
            </div>
        </div>
        <router-view/>
    </div>
</template>-->

<template>
    <div>
        <router-view/>
    </div>
</template>

<script>
    export default {
        name:'Main',
        mounted(){
            const plugin = document.createElement('script')
            plugin.setAttribute('src','/js/myscripts/scriptMain.js')
            plugin.async = true
            document.head.appendChild(plugin)
        }
    }   
</script>
