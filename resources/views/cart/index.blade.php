@extends('layouts.content')

@section('body')

<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Panier</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Panier</li>
</ol>
</nav>
</div>
</div>
</section>


@if ($success != '')
<div class="mt-50 text-center alert alert-danger" style="margin-left: 100px; margin-right: 100px">
    <h4> {{$success}} </h4>
</div>
@endif

<section class="cart-page mt-50 rmt-95 mb-150 rmb-100">
<div class="container">
<div class="cart-total-product mb-55">
<div class="cart-title d-none d-md-flex">
<h3 class="product-title">Produit</h3>
<h3 class="price-title">Prix Approximatif</h3>
<h3 class="quantity-title">Quantité</h3>
<h3 class="total-title mr-30">Total</h3>
</div>
<div class="cart-items pb-15">
<form id="contact-form" name="contact_form" class="contact-form text-left" action="{{ route('cart.store') }}" method="POST">
@csrf

@foreach ($carts as $cart)
	<div class="cart-single-item">
		<a href="{{ route('produitDelete',$cart->id ) }}" class="close"><i class="flaticon-cross"></i></a>
		<div class="product-img">
		@foreach ($cart->produit->medias as $media)
                                                        @if ($media->type == 'image1' )
														<img src="/{{ $media->path }}" alt="Product Image" style="width:4rem">
                                                        @endif
                                                    @endforeach
		</div>
		<h5 class="product-name">{{ $cart->produit->nom }}</h5>
		<h5 class="product-price">{{ $cart->produit->prix }}</h5>
		<div class="number-input">
			<button type="button" class="minus"></button>
			<input class="quantity" min="1" name="quantity[{{ $cart->produit->id }}]" value="{{ $cart->quantite }}" type="number">
			<button type="button"  class="plus"></button>
		</div>
		<h5 class="product-total-price"> {{ $cart->produit->prix * $cart->quantite}}</h5>
		<h5 style="margin-bottom: -11rem;">Prix total :</h5> 
			<h5 class="product-total-price" style="margin-bottom: -11rem;">{{ $cart->produit->prix * $cart->quantite}}</h5>
	</div>
	
@endforeach
</div>


<br>

<div class="row">
	<div class="col-md-6">
		<div class="form-group ">
			<label for="name">Nom </label>
			<input type="text" name="first_name" id="name" class="form-control" value="{{ $user->name }}" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="name">Prénom </label>
			<input type="text" name="first_name" id="name" class="form-control" value="{{ $user->lastname }}" disabled>
		</div>
	</div>
</div>

<div class='row'>
	<div class="col-md-6">
		<div class="form-group">
			<label for="phone">Telephone</label>
			<input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}" disabled>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="phone">Adresse</label>
			<input type="text" name="adresse" id="adresse" class="form-control" placeholder="Votre Adresse" required>
		</div>
	</div>
</div>
<div class="form-group text-right mt-20 mb-0">
<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
<center><button class="theme-btn br-30" type="submit" data-loading-text="veuillez patienter...">Valider</button></center>
</div>
</form>
</div>
</div>
</div>
</div>

 </div>
</div>
</div>
</div>
</div>
</section>
@endsection