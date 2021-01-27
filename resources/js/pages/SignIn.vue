<template>
<form action="#" @submit.prevent= "submit">
    <div>
        <label for="email">correo electronico </label>
        <input type="email" name="email" id="email" v-model="form.email">
    </div>
    <div>
        <label for="password"> Contraseña </label>
        <input type="text" name="password" id="password" v-model="form.password">
    </div>
    <button type="submit"> Iniciar Sesión </button>
</form>
</template>
<script>
import {mapActions } from 'vuex'
export default {
    name:"SignIn",
    data(){
        return {
            form:{
                email:'', 
                password:''
           }
        }
    },
    methods:{  
        ...mapActions({
            singIn:'auth/signIn'
        }),
        async submit(){ 
            console.log('ENVIANDO FORMULARIO') 
            console.log(this.form)
            await this.singIn(this.form) 
            this.$router.replace({name:'dashboard'})
        }
    }
} 
</script>  