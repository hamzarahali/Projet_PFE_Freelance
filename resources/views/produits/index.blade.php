@extends('layouts.content')

@section('body')
<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Produits</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Produits</li>
</ol>
</nav>
</div>
</div>
</section>

@if ($success != '')
<div class="mt-50 text-center alert alert-success" style="margin-left: 100px; margin-right: 100px;color: black">
    <h4> {{$success}} </h4>
</div>
@endif

<section class="shop-page mt-150 rmt-100 mb-150 rmb-100">
<div class="container">
<div class="row">
<div class="col-xl-3 col-md-4">
<div class="shop-sidebar">
<div class="shop-widget">
<div class="shop-widget-title">
<h3>Catégories</h3>
</div>
<ul>
    @foreach ($categories as $category)
        <li><a href="{{ route('produit.show', $category->id) }}"><i class="flaticon-lock"></i> {{ $category->nom }}<span></span></a></li>
    @endforeach

</ul>
</div>
<div class="shop-widget">

    <form class="search w-100" action="{{ route('produit.create') }}" method="GET">
    @csrf

        <input type="search" name="nom" placeholder="Search">
        <button type="submit"><span class="flaticon-magnifying-glass" style="top: 0rem;"></span></button>
        
    </form>

</div>
</div>
</div>
<div class="col-xl-9 col-md-8">
<div class="shop-items">
<div class="row">

@foreach ($catProduits as $produit)

<div class="col-lg-4 col-md-6">
<div class="shop-box">
<div class="shop-img">
<a href="{{ route('produit.edit', $produit->id) }}">
@foreach ($produit->medias as $media)
                                                        @if ($media->type == 'image1' )
                                                        <img src="/{{ $media->path }}" alt="Shop Item">
                                                        @endif
                                                    @endforeach
</a>
</div>
<div class="shop-info">
<h5><a href="{{ route('produit.edit', $produit->id) }}">{{ $produit->nom }}</a></h5>
<div class="price-rating">

<a href="{{ route('cart.show', $produit->id ) }}"><i class="flaticon-shopping-cart"></i></a>




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