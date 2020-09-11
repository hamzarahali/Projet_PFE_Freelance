 
 
 <!-- Start XP Container -->
  <div id="xp-container">

    <!-- Start XP Leftbar -->
    <div class="xp-leftbar">    

        <!-- Start XP Sidebar -->
        <div class="xp-sidebar">

            <!-- Start XP Logobar -->
            <div class="xp-logobar text-center">
                <a href="index.html" class="xp-logo"><img src="{{url ('assets/assets_backend/images/logoo.png')}}" class="img-fluid" style="width: 160px;" alt="logo"></a>
            </div>
            <!-- End XP Logobar -->

            <!-- Start XP Navigationbar -->
            <div class="xp-navigationbar">
                <ul class="xp-vertical-menu">
                    
                    <li>
                        <a href="Dashboard.html">
                          <i class="mdi mdi-view-dashboard" ></i><span>Dashboard</span><span class="badge badge-pill badge-primary pull-right"></span>
                        </a>
                    </li>
                    @can('manage-users')
                    <li>
                        <a href="{{ route('superadmin.users.index')}}">
                          <i class="mdi mdi-account-search" style="font-size: 22px;"></i><span>Gestion utilisateurs</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>
                    @endcan
                    <li>
                  
                        <a href="javaScript:void();">
                          <i class="mdi mdi-layers" style="font-size: 18px;"></i><span>Produits</span><i class="mdi mdi-chevron-right pull-right"></i>
                        </a>
                        <ul class="xp-vertical-submenu">
                            <li><a href="gestion produit.html">Gestion Produits</a></li>
                            <li><a href="catégorie produit.html">Catégories</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javaScript:void();">
                            <i class="mdi mdi-clipboard-text" style="font-size:18px; "></i><span>Services</span><i class="mdi mdi-chevron-right pull-right"></i>
                        </a>
                        <ul class="xp-vertical-submenu">                                
                            <li><a href="gestion services.html">Gestion Services</a></li>                                
                            <li><a href="catégorie service.html">Catégories</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="Devis.html">
                          <i class="mdi mdi-database"></i><span>Devis</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>
                   <li>
                        <a href="Contact.html">
                          <i class="mdi mdi-phone" style="font-size: 18px;"></i><span>Contact</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>
                  <li>
                        <a href="javaScript:void();">
                          <i class="mdi mdi-account-multiple" style="font-size: 22px;"></i><span>Formation</span><span class="mdi mdi-chevron-right pull-right"></span>
                        </a>
                         <ul class="xp-vertical-submenu">                                
                            <li><a href="gestion formation.html">Gestion Formations</a></li>                                
                            <li><a href="consulter formations.html"> Consulter Formations</a></li>
                            
                        </ul>
                    </li>
                     <li>
                        <a href="javaScript:void();">
                          <i class="mdi mdi-cart-outline" style="font-size: 18px;"></i><span>Commandes</span><span class="mdi mdi-chevron-right pull-right"></span>
                        </a>
                         <ul class="xp-vertical-submenu">                                
                            <li><a href="commande p.html">Commandes produits</a></li>                                
                            <li><a href="commande s.html"> Commandes services</a></li>
                            
                        </ul>
                    </li>

                    
                    <li>
                        <a href="Rendez-vous.html">
                          <i class="mdi mdi-calendar" style="font-size: 17px;"></i><span>Rendez-vous</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>
                    <li>
                        <a href="commentaire.html">
                          <i class="mdi mdi-comment-processing-outline" style="font-size: 17px;"></i><span>Avis et commentaires</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>

                   
                     <li>
                        <a href="composer-email.html">
                          <i class="mdi mdi-email" style="font-size: 17px;"></i><span>Email</span><span class="badge badge-pill badge-success pull-right"></span>
                        </a>
                    </li>
                     
                  
            </div>
            <!-- End XP Navigationbar -->

        </div>
        <!-- End XP Sidebar -->

    </div>
    <!-- End XP Leftbar -->

    <!-- Start XP Rightbar -->
    <div class="xp-rightbar">

        <!-- Start XP Topbar -->
        <div class="xp-topbar">

            <!-- Start XP Row -->
            <div class="row"> 

                <!-- Start XP Col -->
                <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                    <div class="xp-menubar">
                        <a class="xp-menu-hamburger" href="javascript:void();">
                           <i class="mdi mdi-sort-variant font-24 text-white"></i>
                         </a>
                     </div>
                </div> 
                <!-- End XP Col -->

                <!-- Start XP Col -->
                <div class="col-md-5 col-lg-3 order-3 order-md-2">
                    <div class="xp-searchbar">
                        <form>
                            <div class="input-group">
                              <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <button class="btn" type="submit" id="button-addon2"></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End XP Col -->

                <!-- Start XP Col -->
                <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                    <div class="xp-profilebar text-right">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <div class="dropdown xp-message mr-3">
                                    <a class="dropdown-toggle user-profile-img text-white" href="#" role="button" id="xp-message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       
                                        <span class="badge badge-pill badge-success xp-badge-up"></span>
                                    </a>
                                   
                            <li class="list-inline-item">
                                <div class="dropdown xp-notification mr-3">
                                    <a class="dropdown-toggle user-profile-img text-white" href="#" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       
                                        <span class="badge badge-pill badge-danger xp-badge-up"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                                        <ul class="list-unstyled">
                                          <li class="media">
                                            <div class="media-body">
                                              <h5 class="mt-0 mb-0 my-3 text-dark text-center font-15">3 New Notification</h5>
                                            </div>
                                          </li>  
                                          <li class="media xp-noti">                                                
                                            <div class="mr-3 xp-noti-icon"><i class="mdi mdi-account-plus"></i></div>
                                            <div class="media-body">
                                                <a href="#">  
                                                    <h5 class="mt-0 mb-1 font-14">New user registered</h5>
                                                    <p class="mb-0 font-12 f-w-4">2 min ago</p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media xp-noti">
                                            <div class="mr-3 xp-noti-icon"><i class="mdi mdi-basket"></i></div>
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5 class="mt-0 mb-1 font-14">New order placed</h5>
                                                    <p class="mb-0 font-12 f-w-4">8:45 PM</p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media xp-noti">
                                            <div class="mr-3 xp-noti-icon"><i class="mdi mdi-thumb-up"></i></div>
                                            <div class="media-body">
                                                <a href="#">
                                                    <h5 class="mt-0 mb-1 font-14">John like your photo.</h5>
                                                    <p class="mb-0 font-12 f-w-4">Yesterday</p>
                                                </a>
                                            </div>
                                          </li>
                                          <li class="media">
                                            <div class="media-body">
                                              <h5 class="mt-0 mb-0 my-3 text-black text-center font-15"><a href="#" class="text-primary">View All</a></h5>
                                            </div>
                                          </li>
                                        </ul>                                            
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item mr-0">
                                <div class="dropdown xp-userprofile">
                                    <a class="dropdown-toggle user-profile-img" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('assets/assets_backend/images/topbar/av.png')}}" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-user-live"></span></a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                        <a class="dropdown-item" >Bienvenue</a>
                                          <a class="dropdown-item" href="#"><i class="mdi mdi-account mr-2"></i> Profil</a>
                                       <a class="dropdown-item" href="#"><i class="mdi mdi-logout mr-2"></i> Déconnexion</a>
                                    </div>
                                </div>                                   
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End XP Col -->

            </div> 
            <!-- End XP Row -->
        </div>