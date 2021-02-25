<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">
                Editar Publicacion
            </div>
            <div class="card-body">
                    <form  @submit.prevent = "submit">
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input class="form-control" id="title" name="title"  type="text" placeholder="Titulo" v-model="getPost.title" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="category">Categoria</label>
                            <select class="form-control" id="category" name="category" v-model="getPost.categoryId">
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
                            <textarea class="form-control" id="body" rows="3" v-model="getPost.body"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Editar Publicacion</button>
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
            getCategorys:'category/get_all_categorys',
            getPost:'post/detail_post'
        })
    },
    methods:{
        ...mapActions({
            get_all_categorys:'category/getCategorysAll',
            get_post:'post/detailPost',
            edit_post:'post/editPost'
        }),
        onImageChange(e){
            this.image = e.target.files[0]
        },
        async submit(){

            this.form={
                title:$('#title').val(),
                category:$('#category').val(),
                body:$('#body').val(),
                idpost:this.getPost.id //  esto para el mi propio metodo para actualizar
            }
            
            
            const config = {
                headers:{'content-type':'multipart/form-data'}
            }
            console.log(this.image)
            let formData = new FormData();
            
            formData.append('file',this.image)
            formData.append('form',JSON.stringify(this.form))
            //formData.append('_method','PUT') // AÑADIR PARA EL METODO POR DEFECTO PUT PARA ACTUALIZAR

            

            for(var value of formData.values()){
                console.log(value)
            }
            
            let data = {
                config:config,
                parameter:this.$route.params.slug,
                formdata:formData
            }
            await this.edit_post(data)

        },
    },
    mounted(){
            //console.log(this.$route.params.slug)
            this.get_all_categorys()
            this.get_post(this.$route.params.slug)
    }
}
</script>