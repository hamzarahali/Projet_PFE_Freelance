<header class="main-header">

    <div class="header-upper">
    <div class="container clearfix">
    <div class="header-inner d-lg-flex align-items-center">
    <div class="logo-outer d-flex align-items-center">
    <div class="logo"><a href="index-2.html"><img src="{{ url('assets/images/logoo.png') }}" height="50px;"; width="130px;" alt="" title=""></a></div>
    </div>
    <div class="nav-outer clearfix ml-lg-auto">
    
    <nav class="main-menu navbar-expand-lg">
    <div class="navbar-header clearfix">
    
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>
    </div>
    <div class="navbar-collapse collapse clearfix">
    <ul class="navigation clearfix">
    
    <li><a href="/">Acceuil</a></li>
    <li><a href="{{ route('apropos') }}">A propos</a></li>
    <li class="dropdown"><a href="#">Compte</a>
    <ul>
   
@guest

@if (Route::has('register'))
<li >
    <a  href="{{ route('login') }}">{{ __('Connexion') }}</a>
    </li>
    <li>
        <a  href="{{ route('register') }}">{{ __('Inscription') }}</a>
    </li>


@endif
@else




<li> <form  action="{{ route('logout') }}" method="POST" >
    @csrf
    <input type="submit" value="deconnecter" style="cursor: pointer; background-color: transparent">
</form>
@if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('admin'))
<li><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
@endif
@endguest
    
    
    </ul>
    </li>
    
    <li class="dropdown"><span><a href="{{ route('service.index') }}">Services</a></span>
        <ul>
            @foreach ($services as $service) 
                <li><a href="{{ route('service.show', $service->id) }}">{{ $service->nom }}</a></li>
            @endforeach
        </ul>
    </li>
    
    
    <li class="dropdown"><a href="{{ route('produit.index') }}">Produits</a>
        <ul>
            @foreach ($categories as $category) 
                <li><a href="{{ route('produit.show', $category->id) }}">{{ $category->nom }}</a></li>
            @endforeach
        </ul>
    </li>
    
    <li >
        <a href="{{ route('devis.index')}}">Devis</a>
    </li>

    <li class="dropdown"><a href="">Formation</a>
        <ul>
            @foreach ($formations as $formation) 
                <li><a href="{{ route('formation.show', $formation->id) }}">{{ $formation->nom }}</a></li>
            @endforeach
        </ul>
    </li>

    <li><a href="{{ route('contactpage.index') }}">Contact</a></li>

    </ul>
    </div>
    </nav>
    
    </div>
   <!-- <li class="dropdown"><i class="far fa-user" style="color: white"> <a href="#"></i></a>
        <ul>
        <li><a href="alarme.html">Log in</a></li>
        <li><a href="incendie.html">logout</a></li>
        <li><a href="Vidéosurveillance.html">Register</a></li>
        </ul>
        </li> -->
  
  
    <div class="menu-btn">
    
    <div class="cart">
        <a href="{{ route('cart.index') }}"><i class="flaticon-shopping-cart"></i></a>
    </div>
  
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    </header>