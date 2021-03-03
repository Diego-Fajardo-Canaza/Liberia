<!--<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card-header">
                    <h2>Publicaciones Hidekair </h2>
                </div>
                <div class="card-body" v-for="(post,index) in getposts.data" :key="index">
                    <div class="media">
                        <div class="media-body">
                            <h3>{{post.title}}</h3>
                            <p>
                                <span class="text-default">
                                    {{post.user.name}}
                                </span>
                                <span class="text-danger">
                                    {{post.added}}
                                </span>
                            </p>
                            <p class="lead">{{post.body.substr(0,200)}}...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>-->
<template>
    <div id="page-top">
            <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book-reader"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Buscador de libros <sup>UATF</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                    <router-link :to="{name:'dashboard.post'}" class="nav-link" ><i class="fas fa-fw fa-tachometer-alt"></i>
                     Libros Publicados</router-link >
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Los Libros
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Libros Publicados </span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header"> Mis Libros:</h6>
                        <router-link :to="{name:'dashboard.createpost'}" class="collapse-item">Subir Libro   </router-link >
                        <router-link :to="{name:'dashboard.userpost'}" class="collapse-item"> Mis libros </router-link >
                        <!--<a class="collapse-item" href="cards.html">Cards</a>-->
                    </div>
                </div>
            </li> 

            <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Categorias</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Configurar:</h6>
                        <router-link :to="{name:'dashboard.createCategory'}" class="collapse-item">Crear Categoria</router-link>
                        <router-link :to="{name:'dashboard.allCategory'}" class="collapse-item">Todas las Categorias</router-link>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Addons
            </div>-->

            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>-->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>-->

            <!-- Nav Item - Tables -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="/resources/assets/images/akhl5Aj.png" alt="">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div>-->

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hidekair</span>
                                <img class="img-profile rounded-circle"
                                    src="data:image/png;base64,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">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"  @click.prevent="logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li> 
    
                    </ul>

                </nav> 
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <router-view></router-view>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">salir </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'
export default {
    name:'Dashboard',
    methods:{
        ...mapActions({
            signOut:'auth/signOut',
        }),
        async logout(){
            await this.signOut()
            this.$router.replace({name:'home'})
        }
    },
    mounted(){
            const plugin = document.createElement('script')
            plugin.setAttribute('src','/js/myscripts/sb-admin-2.min.js')
            plugin.async = true
            document.head.appendChild(plugin)
    }
}
</script>