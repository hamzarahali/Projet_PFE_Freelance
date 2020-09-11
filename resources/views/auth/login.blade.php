
@extends('layouts.content')

@section('body')

<style>
  .field-icon {
    float: right;
    margin-left: 28rem;
    margin-top: -4.2rem;
    position: absolute;
    z-index: 2;
}
</style>

<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Identification</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Identification</li>
</ol>
</nav>
</div>
</div>
</section>

<div class="formulaire" style="margin-left: 380px;">



<section class="checkout-page mt-150 rmt-100 mb-150 rmb-100">
<div class="container">
<div class="row">
<div class="col-xl-7 col-lg-6">
<div class="checkout-form-wrap rmb-50">
<div class="cart-title">

<center><h3>Identification</h3></center>
</div>


                            <form id="checkout-form" name="checkout-form" class="checkout-form" action=" {{ route( 'login') }} " method="POST">@csrf
                                <img src="{{url('assets/images/avatar.png')}}" alt=" " style="position: absolute; top: -80px; left: calc(50% - 50px); width: 100px; background: rgba(255,255,255, 0.8); border-radius: 50%; ">


                                <div class="col-md-12 ">
                                    <div class="form-group ">
                                        <input type="email " name="email" id="email" placeholder ="Vote Adresse Email" class="form-control @error( 'email') is-invalid @enderror " value="{{ old( 'email') }}" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback " role="alert ">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      </div>
                                </div>
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder=" Votre Mot de passe" class="form-control @error( 'password') is-invalid @enderror" required autocomplete="current-password">
                                        <label for="password"toggle="#password-field" onclick="text(this)" class="fa fa-fw fa-eye field-icon toggle-password"></label>
                                        @error('password')
                                        <span class="invalid-feedback " role="alert ">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                      </div>
                                </div>
                                <center><button type="submit " class="btn btn-primary ">
                                  {{ __('Se connecter') }}
                              </button></center>
                                <br>
                                <center>
                                  @if (Route::has('password.request'))
                                  <a class="btn btn-link " href="{{ route( 'password.request') }} ">
                                      {{ __('Mot de passe oublié?') }}
                                  </a>
                              @endif
                                </center>
                                <br>
                                <center>
                                    <li><a href="{{ route('register') }}">Créer un compte</a></li>
                                </center>

                        </div>
                        </form>




                    </div>
                </div>
            </div>


    </div>
    <button class="scroll-top scroll-to-target " data-target="html "><span class="fa fa-angle-up "></span></button>


<script> function text(label){
        var input = document.getElementById(label.htmlFor);
          if(input.type === "password"){
            input.type = "text";
          }else{
            input.type = "password";
          }
      } </script>
     
     @endsection