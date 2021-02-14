<!--<template>
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
</template>-->

 <template>   
    <body>
	<div>
		<NavHome :color="color"/>
		<div class="limiter" style="padding-top: 2%;">
			<div class="container-login100">
				<div class="wrap-login100" >
					<div class="login100-form-title" >
					<span class="login100-form-title-1">
							Inicio De Sesión
						</span>
					</div>

					<form class="login100-form validate-form" @submit.prevent= "submit"> 
						<div class="wrap-input100 validate-input m-b-26" data-validate="User name" >
							<span class="label-input100">Username</span>
							<input in="email" class="input100" type="email" name="email" placeholder="Correo Electronico" v-model="form.email">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18" data-validate = "Password">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" id="password" placeholder="password" v-model="form.password"> 
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox">
								<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									recordar esta cuenta
								</label>
							</div>

							<div>
								<a href="#" class="txt1">
									olvidaste tu contraseña ?
								</a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</form>
					<div class=".img-login"></div>
				</div>
			</div>
		</div>
	</div>
		 
	
    </body>
</template>

    <!--<style scoped>
        @import url('../../css/mainAuth');
        @import url('../../css/utilAuth');
    </style> --> 

<script>
import {mapActions } from 'vuex'
import NavHome from '../components/NavHome'
export default {
    name:"SignIn",
    components:{NavHome},
    data(){
        return {
            form:{
                email:'', 
                password:''
           } ,
		   color:'black'
        }
    },
    methods:{  
        ...mapActions({
            singIn:'auth/IniciarSesion'
        }),
        async submit(){ 
            console.log('ENVIANDO FORMULARIO') 
            console.log(this.form)
            await this.singIn(this.form) 
            this.$router.replace({name:'dashboard.post'})
        }
    }
} 
</script>  