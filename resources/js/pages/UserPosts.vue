<template>
    <div class="row">
        <div class="col-lg-6" v-for="(post,index) in get_posts_user.data" :key="index">
            <div class="card shadow mb-4">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{post.title}}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <!--<a class="dropdown-item" :post-edit="post.slug" v-on:click="editPost">Editar</a>-->
                            <a class="dropdown-item" v-on:click="editPost(post.slug)">Editar</a>
                            <!--<router-link class="dropdown-item" :to="{name:'dashboard.editpost',params:{slug:post.slug}}">
                                Editar
                            </router-link>-->
                            <a class="dropdown-item" v-on:click="deletePost(post.slug)">Eliminar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                
                <img :src="post.photo" width="100%" height="300px"/> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-default">
                                {{post.user.name}}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="text-danger text-right d-block">
                                {{post.added}}
                            </span>
                        </div>
                    </div>
                    <p class="lead">{{post.body.substr(0,200)}}...</p>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    name:'UserPosts',
    computed:{ 
        ...mapGetters({
            get_posts_user:'post/get_posts_user'
        })
    },
    methods:{
        ...mapActions({
            get_all_post_user:'post/getAllPostUser',
            delete_post:'post/deletePost',
        }),
        editPost(paramSlug){
            //this.$router.replace({name:'dashboard.editpost',params:{slug:$(e.currentTarget).attr('post-edit')}})
            this.$router.replace({name:'dashboard.editpost',params:{slug:paramSlug}})
        },
        deletePost(paramSlug){
            this.delete_post(paramSlug)
        }
    },
    mounted(){
        this.get_all_post_user()
    },
}
</script>