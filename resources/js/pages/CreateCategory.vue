<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">
                Crear nueva Categoria
            </div>
            <div class="card-body">
                    <form  @submit.prevent = "submit" id="createCategory">
                        <div class="form-group">
                            <label for="title">Nombre</label>
                            <input class="form-control" id="name" name="name"  type="text" placeholder="Nombre" v-model="form.name" autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Categoria</button>
                    </form>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    name:'CreateCategory',
    data(){
        return {
            form:{
                name:'',
            },
        }
    },
    methods:{
        ...mapActions({
            create_category:'category/createCategory'
        }),
        async submit(){
            try{
                await this.create_category(this.form)
                $('#createCategory')[0].reset()
                this.$swal({
                    	title: 'creado!',
						text: 'creado correctamente',
						imageUrl: 'https://img.wattpad.com/005d5b366714d7927614652c2cdb63673a9480d3/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f4f2d33697348724a3347703149513d3d2d3434383138323736342e313464356536663163393963623063363230353839353132333939372e6a7067?s=fit&w=720&h=720',
						imageWidth: 400,
						imageHeight: 200,
                })
            } catch (error) {
                let msgError = ''
				let obj = error.response.data.errors
				for(var prop in obj){
					if(!obj.hasOwnProperty(prop)) continue
					obj[prop].forEach(element => {
						msgError = element + ' ' + msgError
					});
				}
				this.$swal({
						title: 'Error!',
						text: 'error de creacion de publicacion',
						imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSf6po1wpCNAaqO4i_By9ww0nT-9BxkyBHekw&usqp=CAU',
						imageWidth: 400,
						imageHeight: 200,
						imageAlt: msgError,
				})  
            }
        }

    }
}
</script>