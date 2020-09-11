@extends('layouts.content')

@section('body')

<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Formation</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Formation</li>
</ol>
</nav>
</div>
</div>
</section>

<section class="blog-details-page mt-150 rmt-100 mb-135 rmb-95">
<div class="container">
<div class="row">
<div class="col-lg-8">
<div class="blog-details-content bg-white br-10 mb-50">
<h2 class="mb-40">{{ $formation->nom }}</h2>
<img src="/{{ $formation->image }}" alt="Blog Details Image">
<div class="date-admin mt-15 mb-15">

</div>
<br>

<p> {{ $formation->description }}
</p>
 <br>
 <center><a href="{{ route('demandeformation.index') }}" class="theme-btn br-30 ml-25">Réserver</a></center>
</div>

<div class="blog-details-tags mb-50">

<div class="tags d-inline">

</div>
</div>
<div class="related-post mb-30">
<h3 class="inner-title">Autres formations</h3>
<div class="row text-center">
@foreach ($formations as $form) 
<div class="col-md-6">
    <div class="latest-news-box">
        <div class="latest-news-img">
            <img src="/{{$form->image}}" style="width: 360px; height: 210px;" alt="Blog Image">
        </div>
        <div class="latest-news-content">
            <h3><a href="{{ route('formation.show', $form->id )}}">{{ $form->nom }}</a></h3>
            <span class="date"></span>
            <p>{{ $form->description }}</p>
            <ul class="blog-statistics">
                <div style="margin-left: 90px;"><li><i class="flaticon-eye"></i>400</li></div>
            </ul>
            <div class="news-btn">
            <a href="{{ route('formation.show', $form->id )}}" class="theme-btn">Voir plus</a>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>
<div class="comments mb-60">

<div class="comment-item">
<div class="comment-img">

</div>
<div class="comment-content">

</div>
</div>
<div class="comment-item replay-comment">
<div class="comment-img">

</div>
<div class="comment-content">

</div>
</div>
<div class="comment-item">
<div class="comment-img">

</div>
<div class="comment-content">

</div>
</div>
<div class="comment-item">
<div class="comment-img">
</div>
<div class="comment-content">

</div>
</div>
</div>
<div class="comment-form">

<div class="row clearfix">
<div class="col-md-6">
<div class="form-group">

</div>
</div>
<div class="col-md-6">
<div class="form-group">

</div>
</div>
<div class="col-md-12">
<div class="form-group">

</div>
</div>
<div class="col-md-4">
<div class="form-group">

</div>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-4">
<div class="blog-sidebar rmt-50">
<div class="widget">


</form>
</div>
<div class="widget news-widget">

</ul>
</div>
<div class="widget categories-widget">

</ul>
</div>


</div>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection