<template>
    <div>
        <NavHome :color="color"/>
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold" >Página web de Búsqueda de libros Online para la UATF </h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">En esta pagina se ralizara la busqueda de los libros registrados en la Biblioteca central de la UATF para evitar amontonamiento de personas en la biblioteca central</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">presiona para mas</a>
                    </div>
                </div> 
            </div>
        </header>
           <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container" v-for="(post,index) in publicaciones.data" :key="index">
                <div class="col-lg-6"> <img class="img-fluid"  :src="post.photo"  alt=""  /></div>
                <br>
                <div class="row justify-content-center" >
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0"> {{post.title}}</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">creado por :  {{post.user.name}}     hace : {{post.added}}</p>
                        <p class="text-white-50 mb-4">{{post.body.substr(0,200)}}...</p>
                        <br><br>
                        <!--<a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Vamos AHORA!</a>-->
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <h2 class="text-center mt-0">Relleno</h2>
                <hr class="divider my-4" />
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-gem text-primary mb-4"></i>
                            <h3 class="h4 mb-2"> La busqueda es dura como diamante</h3>
                            <p class="text-muted mb-0">busca los libros a tu mejor preferencia </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-laptop-code text-primary mb-4"></i>
                            <h3 class="h4 mb-2">descarga tus libros de forma pirata</h3>
                            <p class="text-muted mb-0">busca la forma de descargarla en forma pirata </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-globe text-primary mb-4"></i>
                            <h3 class="h4 mb-2">sube tus propio libros para ayudar a los demas</h3>
                            <p class="text-muted mb-0">si tienes libros que quieras compartir puedes hacerlo aqui</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <i class="fas fa-4x fa-heart text-primary mb-4"></i>
                            <h3 class="h4 mb-2">una comunidad unida creo</h3>
                            <p class="text-muted mb-0">de esta manera podremos ayudarnos a todos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
          <section class="container-fluid p-0" id ="Main" >
                <router-view/>
        </section>
        <!-- Portfolio-->
        <!--codigo proyecto-->
      

        <div id="portfolio">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <!--<div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/2.jpg" alt="" />
                            <div class="portfolio-box-caption">
                              <!--  <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/3.jpg" alt="" />
                            <div class="portfolio-box-caption">
                                <!--<div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/4.jpg" alt="" />
                            <div class="portfolio-box-caption">
                               <!-- <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg" alt="" />
                            <div class="portfolio-box-caption">
                               <!-- <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg" alt="" />
                            <div class="portfolio-box-caption p-3">
                               <!-- <div class="project-category text-white-50">Category</div>
                                <div class="project-name">Project Name</div>-->
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">Aqui acaba la Página</h2>
                <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/"></a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Comunicate con nosotros</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nemo eos possimus esse ratione sapiente iste eum fugit officiis provident, totam debitis voluptas sunt tempore neque error vitae natus quaerat.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div>555555557</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">aqui_no_chikistrikis@gmail.com</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>

import {mapGetters, mapActions} from 'vuex' 
import NavHome from '../components/NavHome'
export default {
    name:'Home',
    data(){    
        return{
            color:'' 
        }
    },

    components:{NavHome},
    computed:{
        ...mapGetters({
            publicaciones:'post/get_publicaciones'
        })
    },
    methods:{
        ...mapActions({
            get_publicaciones:'post/get_todas_publicaciones',
        }),
    },
    created(){
        this.get_publicaciones()
    },
}
</script>  