<template>
    <form action="#" @submit.prevent= "submit">
        <div>
            <label for="name"> Nombre  </label>
            <input type="text" name="name" id="name" v-model="form.name">
        </div>
        <div>
            <label for="email">correo electronico </label>
            <input type="email" name="email" id="email" v-model="form.email">
        </div>
        <div>
            <label for="password"> Contraseña </label>
            <input type="text" name="password" id="password" v-model="form.password">
        </div>
        <div>
            <label for="password"> Confirmar Contraseña </label>
            <input type="text" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation">
        </div>
        <button type="submit"> Registrarse </button>
    </form>
</template>

<script>
import {mapActions} from 'vuex'
export default {
    name:'SignUp',
    data(){
        return {
            form:{
                name:'',
                email:'', 
                password:'',
                password_confirmation:''
            }
        }
    },
    methods:{
        ...mapActions({
            send:'auth/signUp'
        }),
        async submit(){
            await this.send(this.form)
            this.$router.replace({name:'dashboard'})
        }
    }
} 
</script> 