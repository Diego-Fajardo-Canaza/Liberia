<template>
    <div class="row">
        <div class="col-lg-3 mb-4 " v-for="(post,index) in getposts.data" :key="index">
            <div class="card shadow mb-4 h-100">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"> 
                        <!--<router-link :to="'detail-post/'+post.path">
                            {{post.title}}
                        </router-link>-->
                        <router-link :to="{name: 'dashboard.detailpost', params:{slug: post.path}}">{{post.title}}</router-link>
                        
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Opciones:</div>
                            <a class="dropdown-item" href="#">Editar</a>
                            <a class="dropdown-item" href="#">Eliminar</a>
                            <div class="dropdown-divider"></div> 
                            <!--<a class="dropdown-item" href="#">No hac</a>-->
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <img :src="post.photo" width="100%" height="300px"/>
                <embed :src="post.file" width="100%" height="200px"/>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-default">
                                {{post.user.name}}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="text-danger">
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
    name:'Posts',
    computed: {
        ...mapGetters({
            getposts: 'post/reponsePosts'
        })
    },
    methods: {
        ...mapActions ({
            getallposts: 'post/getAllPost',
        }),
    },
    created() {
        this.getallposts()
    },
}
</script>