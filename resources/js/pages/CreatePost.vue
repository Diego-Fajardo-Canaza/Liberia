<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">
                    Crear una nueva publicacion 
                </div>
                <div class="card-body">
                    <form @submit.prevent= "submit"> 
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input class="form-control" id="title" name="title" type="text" placeholder="Titulo" v-model="form.title">
                        </div>
                        <div class="form-group">
                            <label for="category"> Categoria</label>
                            <select class="form-control" id="category" name="category" v-model="form.category">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Imagen</label>
                            <input class="form-control" id="image" name="image" type="file" placeholder="subir Imagen"  v-on:change="onImageChange">
                        </div>
                        <div class="form-group">
                            <label for="body">Contenido</label>
                            <textarea class="form-control" id="body" rows="3" v-model="form.body"></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger"> Crear Piblicacion</button>
                    </form>
                </div>
            </div>
         
    </div>
</template>
<script>

import {mapActions} from 'vuex'
export default {
    name:'Posts' ,
    data(){
        return{
            form:{
                title:'',
                category:'',
                body:'',
            },
            image:''
        }
    },
    methods:{
        ...mapActions({
            send_create_post:'post/createPost'
        }),
        onImageChange(e){
            console.log(e.target.files [0]);
            this.image =e.target.files [0]
        },
        async submit(){
            //await this.send_create_post(this.form)
            const config ={
                headers:{'content-type': 'multipart/form-data'}
            }

            console.log(this.image)
            let formData = new FormData();
            //formData.append('image',this.image)
            formData.append('file',this.image)
            formData.append('form',JSON.stringify(this.form))
            //console.log(formData)
            /*for (var key of formData.entries()){
                console.log(key[0]+','+key[1])
            }*/
            let data = {
                config : config,
                formdata:formData
            }
            await this.send_create_post(data)
        }
    }
}
</script>