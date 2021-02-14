<template><!-- main -->
    <div>
        <NavHome/>
        <div class="main-w3layouts wrapper">
		
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" @submit.prevent = "submit">
                    <div>
                        <label for="name">Nombre</label>
                        <input class="text" type="text" name="name" id="name" v-model="form.name">
                    </div>
                    <div>
                        <label for="email">Correo electronico</label>
					    <input class="text email" type="email" name="email" id="email" v-model="form.email">
                    </div>
                    <div>
                        <label for="password">Contraseña</label>
					    <input class="text" type="password" name="password" id="password" v-model="form.password">
                    </div>
                    <div>
                        <label for="password_confirmation">Confirmar Contraseña</label>
					    <input class="text w3lpass" type="password" name="password_confirmation" id="password_confirmation" v-model="form.password_confirmation">
                    </div>
					
					<input type="submit" value="SIGNUP">
				</form>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© Todos los derechos reservados Tecnologias Emergentes 2021 <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
    </div>
	
</template>

<script>
import {mapActions} from 'vuex'
import NavHome from '../components/NavHome'
export default {
    name:'SignUp',
    components: {NavHome},
    data() {
        return {
            form:{
                name:'',
                email:'',
                password:'',
                password_confirmation:''
            }
        }
    },
    methods: {
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