

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
<h2 class="page-title">Inscription</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Inscription</li>
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

<center><h3>Inscription</h3></center>
</div>


<form id="checkout-form" name="checkout-form" class="checkout-form" action="{{ route('register') }}" method="POST">
    @csrf
	<img src="assets/images/avatar.png" alt="" style="position: absolute;
  top: -80px;
  left: calc(50% - 50px);
  width: 100px;
  background: rgba(255,255,255, 0.8);
  border-radius: 50%;">


<div class="row clearfix">  
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nom" name="name" value="{{ old('name') }}">
@error('name')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
 </div>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Prénom"  name="lastname" value="{{ old('lastname') }}">
@error('lastname')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control @error('entreprisename') is-invalid @enderror" placeholder="Nom Société" name="entreprisename" value="{{ old('entreprisename') }}">
@error('entreprisename')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Téléphone" name="phone" value="{{ old('phone') }}">
@error('phone')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"  name="email" value="{{ old('email') }}">
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe" name="password" >
<label for="password"toggle="#password-field" onclick="text(this)" class="fa fa-fw fa-eye field-icon toggle-password"></label>

@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<input type="password" id="password1"  class="form-control  @error('password_confirmation') is-invalid @enderror" placeholder="Confirmer le mot de passe"  name="password_confirmation">

<label for="password1"toggle="#password-field" onclick="text(this)" class="fa fa-fw fa-eye field-icon toggle-password"></label>

@error('password_confirmation')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

</div>
<center><button type="submit " class="theme-btn br-30 mt-30 ">Enregistrer</button></center>
</form>
</center>

</div>
</div>
</div>
</div>  
</div>




<script> function text(label){
        var input = document.getElementById(label.htmlFor);
          if(input.type === "password"){
            input.type = "text";
          }else{
            input.type = "password";
          }
      } </script>



@endsection