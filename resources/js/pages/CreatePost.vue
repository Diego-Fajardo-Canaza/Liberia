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
                            <input class="form-control" id="file" name="file"  type="file" placeholder="subir documento" v-on:change="onFileChange">
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
            image:'',
            file:''
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
        onFileChange(e){
            this.file = e.target.files[0]
        },
        async submit(){
            //await this.send_create_post(this.form)
            const config = {
                headers:{'content-type':'multipart/form-data'}
            }
            console.log(this.image)
            console.log(this.file)
            let formData = new FormData();
            //formData.append('image',this.image)
            formData.append('file',this.file)
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
                    	title: 'creado!',
						text: 'subido correctamente',     
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
						text: 'error al subir el libro',
						imageUrl: 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSf6po1wpCNAaqO4i_By9ww0nT-9BxkyBHekw&usqp=CAU',
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


				