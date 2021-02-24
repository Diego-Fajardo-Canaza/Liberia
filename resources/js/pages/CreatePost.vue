<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">
                Crear nueva Publicacion
            </div>
            <div class="card-body">
                    <form  @submit.prevent = "submit" id="createPost">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input class="form-control" id="title" name="title"  type="text" placeholder="Titulo" v-model="form.title" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" id="category" name="category" v-model="form.category">
                                <option selected="true" disabled="disabled" value="">Seleccione una categoria</option>
                                <option v-for="(category,index) in getCategorys" :key="index" :value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Imagen</label>
                            <input class="form-control" id="image" name="image"  type="file" placeholder="Subir Imagen" v-on:change="onImageChange">
                        </div>
                        <div class="form-group">
                            <label for="title">Documento</label>
                            <input class="form-control" id="file" name="file"  type="file" placeholder="Subir documento" v-on:change="onImageChange">
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido</label>
                            <textarea class="form-control" id="body" rows="3" v-model="form.body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Crear Publicacion</button>
                    </form>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions, mapGetters} from 'vuex'
export default {
    name:'Posts',
    data(){
        return {    
            form:{
                title:'',
                category:'',
                body:'',
            },
            image:''
        }
    },
    computed:{
        ...mapGetters({
            getCategorys:'category/get_all_categorys'
        })
    },
    methods:{
        ...mapActions({
            send_create_post:'post/createPost',
            get_all_categorys:'category/getCategorysAll'
        }),
        onImageChange(e){
            this.image = e.target.files[0]
        },
        async submit(){
            //await this.send_create_post(this.form)
            const config = {
                headers:{'content-type':'multipart/form-data'}
            }
            console.log(this.image)
            let formData = new FormData();
            //formData.append('image',this.image)
            formData.append('file',this.image)
            formData.append('form',JSON.stringify(this.form))

            //console.log(formData)

            /*for(var key of formData.entries()){
                console.log(key[0] +' , ' + key[1])
            }*/
            
            let data = {
                config:config,
                formdata:formData
            }
            try {
                await this.send_create_post(data)   
                $('#createPost')[0].reset()
                this.$swal({
                    icon: 'success',
                    title: 'Creado correctamente',
                    showConfirmButton: false,
                    timer: 2500
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
						text: 'error de inicio de sesion',
						imageUrl: 'https://i.ytimg.com/vi/NToMpvmpD08/hqdefault.jpg',
						imageWidth: 400,
						imageHeight: 200,
						imageAlt: msgError,
				})
                
            }
        },
    },
    mounted(){
            this.get_all_categorys()
    }
}
</script>
