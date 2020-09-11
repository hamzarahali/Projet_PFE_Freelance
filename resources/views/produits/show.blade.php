@extends('layouts.content')

@section('body')
<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Details produit</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Produits</li>
<li class="breadcrumb-item active" aria-current="page">Details produit</li>
</ol>
</nav>
</div>
</div>
</section>

@if ($success != '')
<div class="mt-50 text-center alert alert-success">
    <h4> {{$success}} </h4>
</div>
@endif


<section class="shop-details-page mt-50 rmt-100 mb-120 rmb-70">
<div class="container">
<div class="row">
<div class="col-lg-6">
<div class="product-preview-wrap">
<div class="tab-content">

<div class="tab-pane active" id="{{$media1->id}}">
            <img src="/{{$media1->path}}" alt="Product Preview Image" data-magnify-src="/{{$media1->path}}" />
</div>    
@foreach ($produit->medias as $media)
        <div class="tab-pane" id="{{$media->id}}">
            <img src="/{{$media->path}}" alt="Product Preview Image" data-magnify-src="/{{$media->path}}" />
        </div>                                                        
@endforeach
                                      
</div>
<ul class="nav nav-tabs d-flex align-content-between">
@foreach ($produit->medias as $media)
        <li>
            <a data-toggle="tab" href="#{{$media->id}}">
                <img src="/{{ $media->path }}" alt="Product Thumbnail Image" />
            </a>
        </li>
@endforeach

</ul>
</div>
</div>
<div class="col-lg-6">
<div class="product-details">
<h3 class="mb-25 rmt-25">{{ $produit->nom }}</h3>
<h6>Nom produit : <span>{{ $produit->nom }}</span></h6>
<h6>Marque : <span>{{ $produit->marque }}</span></h6>
<h6>Prix: <span>{{ $produit->prix }}</span> Dt</h6>
@if ($produit->quantite != 0)
    <h6>Disponibilité: <span>En stock</span></h6>
@else 
    <h6>Disponibilité: <span>Repture de stock</span></h6>  
@endif 


<form action="{{ route('cart.show', $produit->id ) }}" method="DELETE">
@csrf

<div class="product-spinner mt-20">
@if ($produit->quantite != 0)
<div class="number-input">
    <button type="button" class="minus"></button>
    <input min="1" name="quantity" value="2" type="number" max="{{ $produit->quantite}}">
    <button type="button" class="plus"></button>
</div>
    <button type="submit" class="theme-btn br-30 ml-25">Ajouter au panier</button> &nbsp &nbsp 

@endif
</form>
<!-- <button class="theme-btn no-shadow bg-black br-10" type="submit" style="border-radius: 30px;">Comparer</button> -->
</div>
</div>
</div>
</div>
<div class="product-details-review">
<ul class="nav nav-tabs mb-20 mt-25">
<li><a href="#details" class="active" data-toggle="tab">Détails du produit</a></li>

</ul>
<div class="tab-content">
<div class="tab-pane active" id="details">
<p>{{ $produit->description }}</p>
<ul class="list-style-one mt-25 mb-25">


</ul>
</div>
<div class="tab-pane" id="review">
<div class="single-review">
<div class="reviewer-img">
<img src="assets/images/shop/reviewer-1.png" alt="Reviewer Image">
</div>
<div class="reviewer">
<h6>Robert Down</h6>
<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor purus. Sed vel lacus.</p>
</div>
<div class="reviewer-rating">
<span>7 Aug, 2019</span>
<div class="ratings">
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
</div>
</div>
</div>
<div class="single-review">
<div class="reviewer-img">
<img src="assets/images/shop/reviewer-2.png" alt="Reviewer Image">
</div>
<div class="reviewer">
<h6>Smit Down</h6>
<p>Sed ac risus. Phasellus lacinia, magna a ullamcorper laoreet, lectus arcu pulvinar risus, vitae facilisis libero dolor purus. Sed vel lacus.</p>
</div>
<div class="reviewer-rating">
<span>7 Aug, 2019</span>
<div class="ratings">
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
</div>
</div>
</div>
<div class="review-form mt-135 rmt-85">
<div class="section-title text-center">
<h2>Write a Review</h2>
<span class="line"></span>
</div>
<form id="contact-form" name="contact_form" class="contact-form" action="https://tf.techoners.com/cosecu/sendmail.php" method="POST">
<div class="row clearfix">
<div class="col-md-6">
<div class="form-group">
<label for="name">Full Name</label>
<input type="text" name="first_name" id="name" class="form-control" value="" placeholder="Jhon Mack" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" value="" placeholder="eg : yourmail@gmail.com" required="">
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="message">Message</label>
<textarea name="message" id="message" class="form-control" rows="7" placeholder="Comment" required=""></textarea>
</div>
</div>
<div class="col-md-4 d-flex">
<div class="your-rating d-flex align-items-center">
<h6 class="mb-0 mr-15">Your Rating:</h6>
<div class="ratings" id="your-rating">
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
<i class="flaticon-star"></i>
</div>
</div>
</div>
<div class="col-md-4">
<div class="upload-btn-wrapper">
<button class="upload-btn">
<span><i class="flaticon-attached-file"></i>Add Images</span>
</button>
<input type="file" name="myfile">
</div>
</div>
<div class="col-md-4">
<div class="form-group text-left text-md-right mb-0">
<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
<button class="theme-btn br-30" type="submit" data-loading-text="Please wait...">Submit</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="related-product mt-135 rmt-95">
<h3 class="mb-35">Produits similaires</h3>
<div class="row">
@foreach ($produits as $prod)

    <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="shop-box">
            <div class="shop-img">
                <a href="{{ route('produit.edit', $produit->id) }}">
                
                @foreach ($produit->medias as $media)
                                                        @if ($media->type == 'image1' )
                                                        <img src="/{{ $media->path }}" alt="Shop Item">
                                                        @endif
                                                    @endforeach
            </div>
            <div class="shop-info">
                <h5><a href="{{ route('produit.edit', $produit->id) }}">{{ $prod->nom }}</a></h5>
                <div class="price-rating">
                    <a href="{{ route('cart.show', $prod->id) }}"><i class="flaticon-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
</div>
</div>
</section>

@endsection