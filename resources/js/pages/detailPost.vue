<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4 h-100">
                
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{getDetailView.title}}
                    </h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Editar</a>
                            <a class="dropdown-item" href="#">Eliminar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                
                <img :src="getDetailView.photo" width="100%" height="500px"/> 
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <span class="text-default">
                                {{getDetailView.user}}
                            </span>
                            <p>
                                {{getDetailView.category}}
                            </p>
                            <p>
                                {{getDetailView.comments_count}} Comentarios
                            </p>
                        </div>
                        <div class="col-md-6">
                            <span class="text-danger text-right d-block">
                                {{getDetailView.created_at}}
                            </span>
                            
                        </div>
                    </div>
                    <p class="lead">{{getDetailView.body}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card shadow mb-4 h-100">
                <div class="card shadow mb-4 h-100">
                    <div class="card-body">
                        <h5 class="card-title">Comentarios</h5>
                        <div class="mt-5">
                            <div class="d-flex justify-content-center row">
                                <div class="col-md-12">
                                    <div class="d-flex flex-column comment-section">
                                        <div class="comments" v-for="(comment,index) in getDetailView.comments" :key="index">
                                            <div class="bg-white p-2">
                                                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                                    <div class="d-flex flex-column justify-content-start ml-2">
                                                        <span class="d-block font-weight-bold name">{{comment.user}}</span>
                                                        <span class="date text-black-50">{{comment.created}}</span>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="comment-text">{{comment.body.substr(0,200)}}</p>
                                                </div>
                                            </div>
                                            <div class="bg-white">
                                                <div class="d-flex flex-row fs-12">
                                                    <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                                    <div class="like p-2 cursor"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                                                    <div class="like p-2 cursor"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bg-light p-2">
                                            <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                                            <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    name:'DetailPost',
    computed:{
        ...mapGetters({
            getDetailView:'post/detail_post'
        })
    },
    methods:{
        ...mapActions({
            getpostview:'post/detailPost'
        })
    },
    mounted(){
        //console.log(this.$route.params.slug)
        this.getpostview(this.$route.params.slug)
    }
}
</script>