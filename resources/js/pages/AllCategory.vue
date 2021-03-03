<template>
    <div>
        <div class="card mb-4">
            <div class="card-header">
                Todas las categorias
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de Categoria</th>
                            <th scope="col">Fecha</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category,index) in getCategorys" :key="index">
                            <th scope="row">{{index}}</th>
                            <td>{{category.name}}</td>
                            <td>{{category.added}}</td>
                            <td><button class="btn btn-primary">Editar</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters} from 'vuex'
    export default {
        name:'AllCategory',
        computed:{
            ...mapGetters({
                getCategorys:'category/get_all_categorys'
            })
        },
        methods:{
            ...mapActions({
                get_all_categorys:'category/getCategorysAll'
            }),
        },
        mounted(){
            this.get_all_categorys()
        }
    }
</script>