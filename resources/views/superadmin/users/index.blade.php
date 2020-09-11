

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from xpanthersolutions.com/html/booster/html/vertical/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 04:29:13 GMT -->

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Booster is a Responsive Bootstrap & Laravel Admin Dashboard Template">
    <meta name="keywords" content="admin, admin template, admin panel, dashboard template, laravel, ui kits, web app, crm, cms, responsive, bootstrap 4, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title>Gestion des utilisateurs</title>

    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{url('assets/assets_backend/images/logoo.png')}}">

    <!-- Start CSS -->
    <!-- DataTables CSS -->
    <link href="{{url('assets/assets_backend/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('assets/assets_backend/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive Datatable CSS -->
    <link href="{{url('assets/assets_backend/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{url('assets/assets_backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/assets_backend/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{url('assets/assets_backend/css/style.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- End CSS -->

</head>

<body class="xp-vertical">

    <!-- Start XP Container -->
    <div id="xp-container">

        <!-- Start XP Leftbar -->
        <div class="xp-leftbar">

            <!-- Start XP Sidebar -->
            <div class="xp-sidebar">

                <!-- Start XP Logobar -->
                <div class="xp-logobar text-center">
                    <a href="{{ route('home')}}" class="xp-logo"><img src="{{url('assets/assets_backend/images/logoo.png')}}" class="img-fluid" style="width: 160px;" alt="logo"></a>
                </div>
                <!-- End XP Logobar -->

                <!-- Start XP Navigationbar -->
                <div class="xp-navigationbar">
                    <ul class="xp-vertical-menu">
                        <li>
                            <a href="{{ route('admin.dashboard.index') }}">
                                <i class="mdi mdi-view-dashboard"></i><span>Dashboard</span><span class="badge badge-pill badge-primary pull-right"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('superadmin.users.index')}}">
                                <i class="mdi mdi-account-search" style="font-size: 22px;"></i><span>Utilisateurs</span><span class="badge badge-pill badge-success pull-right"></span>
                            </a>
                        </li>
                        <li>
                      
                            <a href="{{ route('admin.gestion_produits.index')}}">
                              <i class="mdi mdi-layers" style="font-size: 18px;"></i><span>Produits</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}">
                              <i class="mdi mdi-layers" style="font-size: 18px;"></i><span>Catégories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.services.index') }}">
                                <i class="mdi mdi-clipboard-text" style="font-size:18px; "></i><span>Services</span>
                            </a>
                            
                        </li>

                        <li>
                            <a href="{{ route('admin.devis.index')}}">
                                <i class="mdi mdi-database"></i><span>Devis</span><span class="badge badge-pill badge-success pull-right"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.contacts.index')}}">
                                <i class="mdi mdi-phone" style="font-size: 18px;"></i><span>Contact</span><span class="badge badge-pill badge-success pull-right"></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.formations.index') }}">
                              <i class="mdi mdi-account-multiple" style="font-size: 22px;"></i><span>Formations</span>
                            </a>
            
                        </li>
                        <li>
                            <a href="{{ route('admin.demandeformation.index') }}">
                              <i class="mdi mdi-account-multiple" style="font-size: 22px;"></i><span>Demandes Formations</span>
                            </a>
                            
                        </li>
                        <li>
                            <a href="{{ route('admin.commands.index') }}">
                                <i class="mdi mdi-cart-outline" style="font-size: 18px;"></i><span>Commandes</span>
                            </a>
                            
                        </li>


                        <li>
                            <a href="{{ route('admin.rendezvous.index') }}">
                                <i class="mdi mdi-calendar" style="font-size: 17px;"></i><span>Rendez-vous</span><span class="badge badge-pill badge-success pull-right"></span>
                            </a>
                        </li>
                      


                        <li>
                            <a href="{{ route('admin.email.index') }}">
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
                                            <i class="mdi mdi-message font-18 v-a-m"></i>
                                            <span class="badge badge-pill badge-success xp-badge-up">{{ $comments->count() }}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-message">
                                            <ul class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 my-3 text-dark text-center font-15">{{ $comments->count() }} New Messages</h5>
                                                </div>
                                              </li>  
                                              @foreach ($comments as $comment)
                                              <li class="media xp-msg">
                                                <img class="mr-3 align-self-center rounded-circle" src="{{ url('assets/images/avatar.png') }}" style="width: 1.8rem;" alt="Generic placeholder image">
                                                <div class="media-body">
                                                <a href="{{ route('service.edit', $comment->id) }}">  
                                                        <h5 class="mt-0 mb-1 font-14">{{ $comment->user->name }}<span class="font-12 f-w-4 float-right">Now</span></h5>
                                                        <p class="mb-0 font-13">Nouveau commentaire...<span class="badge badge-pill badge-success float-right"></span></p>
                                                    </a>
                                                </div>
                                              </li>
                                              @endforeach        
                                    
                                              <li class="media">
                                                <div class="media-body">
                                                  
                                                </div>
                                              </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item">
                                    <div class="dropdown xp-notification mr-3">
                                        <a class="dropdown-toggle user-profile-img text-white" href="#" role="button" id="xp-notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="mdi mdi-bell-ring font-18 v-a-m"></i>
                                            <span class="badge badge-pill badge-danger xp-badge-up">
                                            {{ $notif}}
                                            </span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-notification">
                                            <ul class="list-unstyled">
                                              <li class="media">
                                                <div class="media-body">
                                                  <h5 class="mt-0 mb-0 my-3 text-dark text-center font-15">{{ $notif}} New Notification</h5>
                                                </div>
                                              </li>  
                                              @foreach ($tabs as $tab)
                                              @if ($tab['table'] == 'user' && $tab['date'] != '0000-00-00 00:00:00')
                                              <li class="media xp-noti">                                                
                                                <div class="mr-3 xp-noti-icon"><i class="mdi mdi-account-plus"></i></div>
                                                <div class="media-body">
                                                    <a href="{{ route('superadmin.users.index')}}">  
                                                        <h5 class="mt-0 mb-1 font-14">{{ $tab['details'] }}</h5>
                                                        <p class="mb-0 font-12 f-w-4">{{ $tab['date'] }}</p>
                                                    </a>
                                                </div>
                                              </li>
                                              @elseif ($tab['table'] == 'Command' && $tab['date'] != '0000-00-00 00:00:00')
                                              <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon"><i class="mdi mdi-basket"></i></div>
                                                <div class="media-body">
                                                    <a href="{{ route('admin.commands.index') }}">
                                                        <h5 class="mt-0 mb-1 font-14">{{ $tab['details'] }}</h5>
                                                        <p class="mb-0 font-12 f-w-4">{{ $tab['date'] }}</p>
                                                    </a>
                                                </div>
                                              </li>
                                              @elseif ($tab['table'] == 'rv' && $tab['date'] != '0000-00-00 00:00:00')
                                              <li class="media xp-noti">
                                                <div class="mr-3 xp-noti-icon"><i class="mdi mdi-calendar"></i></div>
                                                <div class="media-body">
                                                    <a href="{{ route('admin.rendezvous.index') }}">
                                                        <h5 class="mt-0 mb-1 font-14">{{ $tab['details'] }}</h5>
                                                        <p class="mb-0 font-12 f-w-4">{{ $tab['date'] }}</p>
                                                    </a>
                                                </div>
                                              </li>
                                              @endif
                                              @endforeach
                                              <li class="media">
                                                <div class="media-body">
                                                  
                                                </div>
                                              </li>
                                            </ul>                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="list-inline-item mr-0">
                                  <a class="dropdown-toggle user-profile-img" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ url('assets/assets_backend/images/topbar/av.png')}}" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-user-live"></span></a>

                                  <div class="dropdown-menu dropdown-menu-right" style="height: 8rem;" aria-labelledby="xp-userprofile">
                                    <a class="dropdown-item" >Bienvenue</a>
                                              <a class="dropdown-item" href="{{ route ('admin.profile.index') }}"><i class="mdi mdi-account mr-2"></i> Profil</a>
                                           <a class="dropdown-item" href=""><i class="mdi mdi-logout mr-2"> <form  action="{{ route('logout') }}" method="POST" style="margin-left: 1rem;margin-top: -1.3rem;" >
                                            @csrf
                                            <input type="submit" value="deconnecter" style="background: transparent;
    border: none;">
                                        </form> </i> </a> 
                                  </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div>
                <!-- End XP Row -->

            </div>
            <!-- End XP Topbar -->

            <!-- Start XP Breadcrumbbar -->
            <div class="xp-breadcrumbbar text-center">
                <h4 class="page-title">Gestion Utilisateurs</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">SITTE</a></li>

                    <li class="breadcrumb-item active" aria-current="page">Gestion utilisateurs</li>
                </ol>
            </div>

            @if ($success  != "")
        <div class="alert alert-success text-center" style="    margin: 2rem 5rem;">
            <p style="color: white;font-size: 20px;">{{ $success }}</p>
        </div>
    @endif

            <div class="xp-contentbar">

                <div class="row">


                    <div class="col-lg-12">
                        <div class="card m-b-30">
                        <div class="text-center pb-2 pt-2">
                            <a class="btn btn-success" href="{{ route('superadmin.users.create') }}"> Ajouter compte admin</a>
                        </div>
                            <div class="card-header bg-white">

                        <div class="col-lg-12">
                            <div class="card m-b-30">

                                <div class="card-header bg-white">
                                    <h5 class="card-title text-black">Export</h5>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                            
                                        <thead>


                                        <tr>
                                            <th>ID</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Rôles</th>
                                            <th>Actions</th>

                                        

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user )
                                        <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                            <td>
                                            <form action="{{ route('superadmin.users.destroy',$user->id) }}" method="POST">
                                            @csrf
                                                                                    @method('DELETE')                           
                                            <a href ="{{ route('superadmin.users.edit', $user->id) }}"><button class="btn2" type="button" style="margin-left: 100px;"><i class="fas fa-pen"></i></button></a>
                        
                                                                                 
                        
                                                                                    <button type="submit" class="btn1"><i class="fas fa-trash"></i></button>
                                                        </form>    
                                        </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                        </table>  
                                         
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- End XP Footerbar -->

                </div>
                <!-- End XP Rightbar -->

            </div>
            <!-- End XP Container -->


            <!-- Start JS -->
            <script src="{{ url('assets/assets_backend/js/jquery.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/popper.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/bootstrap.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/modernizr.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/detect.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/jquery.slimscroll.js') }}"></script>
            <script src="{{ url('assets/assets_backend/js/sidebar-menu.js') }}"></script>

            <!-- Required Datatable JS -->
            <script src="{{ url('assets/assets_backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

            <!-- Buttons Examples -->
            <script src="{{ url('assets/assets_backend/plugins/datatables/dataTables.buttons.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/jszip.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/pdfmake.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/vfs_fonts.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/buttons.html5.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/buttons.print.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/buttons.colVis.min.js') }}"></script>

            <!-- Responsive Examples -->
            <script src="{{ url('assets/assets_backend/plugins/datatables/dataTables.responsive.min.js') }}"></script>
            <script src="{{ url('assets/assets_backend/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

            <!-- Datatable init JS -->
            <script src="{{ url('assets/assets_backend/js/init/table-datatable-init.js') }}"></script>


            <!-- Main JS -->
            <script src="{{ url('assets/assets_backend/js/main.js') }}"></script>
            <!-- End JS -->

</body>

<!-- Mirrored from xpanthersolutions.com/html/booster/html/vertical/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 May 2020 04:29:30 GMT -->

</html>