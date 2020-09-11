@extends('layouts.content')

@section('body')
<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Details service</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item"><a href="index-2.html">Services</a></li>
<li class="breadcrumb-item active" aria-current="page">Details service</li>
</ol>
</nav>
</div>
</div>
</section>


<section class="service-details mt-150 rmt-100 mb-135 rmb-90">
<div class="container">
<div class="service-details-inner">
<div class="service-details-img" style="background-image: url('/{{ $service->image }}')"></div>
<div class="section-title mt-50">
<h2>{{ $service->nom }}</h2>
<span class="line"></span>
</div>
<p>{{ $service->description }}</p>
<div class="service-middle mt-55">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="service-middle-content mr-25">
<h3 class="mb-25">Bénéfices</h3>

<p>{{ $service->benefice }}</p>
</div>
</div>
<div class="col-lg-6">
<div class="service-middle-img rmt-25">
<img src="/{{ $service->image2 }}" alt="Service Middle Image">
</div>
</div>
</div>
</div>
<br>
<br>
<center>
      <a href="{{ route('rendezvous.show', $service->id) }}" class="theme-btn br-30 ml-25">Prise de rendez-vous !</a>
      <a href="{{ route('devis.show', $service->id) }}" class="theme-btn br-30 ml-25">Demander devis</a>
</center>
</div>
</div>

<section class="blog-details-page mt-150 rmt-100 mb-135 rmb-95">
<div class="container">
<div class="row">
<div class="col-lg-8">

<div class="comments mb-60">
@if ($comments->count()!=0 )
      <h3 class="inner-title">Commentaires</h3>
@endif
@foreach ($comments  as $comment)
@if ($comment->user->hasRole('client'))
<div class="comment-item">
      <div class="comment-img">
            <img src="{{ url('assets/images/avatar.png') }}" alt="Commenter" style="    width: 5.5rem;">
      </div>
      <div class="comment-content pt-3">
            <h6>{{ $comment->user->name }}</h6>
            <span class="date">{{ $comment->created_at }}</span>
            <p>{{ $comment->comment }}</p>      
            @if ($comment->comment_id == null && auth()->user() != null)
                  @if (auth()->user()->hasRole('superadmin') || auth()->user()->hasRole('admin')) 
                        <a href="{{ route('service.edit', $comment->id) }}" class="replay">Répondre</a>
                  @endif
            @endif
      </div>

</div>
@endif
@if ($comment->comment_id != null) 
<div class="comment-item replay-comment">
<div class="comment-img">
<img src="{{ url('assets/images/avatar.png') }}" alt="Commenter" style="    width: 6rem;
    margin-top: -1rem;">
</div>
<div class="comment-content">
<h6>{{ $comment->commentnext($comment->comment_id)->user->name }}</h6>
<span class="date">{{ $comment->commentnext($comment->comment_id)->created_at }}</span>
<p>{{ $comment->commentnext($comment->comment_id)->comment }}</p>
</div>
</div>
@endif
@endforeach


@if (auth()->user() != null)
<div class="comment-form">
<h3 class="inner-title">Ecrivez un commentaire</h3>
<form id="comment-form" name="comment_form" class="comment-form" action="{{ route('comment.store') }}" method="POST">
      @csrf
<div class="row clearfix">
<div class="col-md-6">
<div class="form-group">
<input type="text" name="first_name" id="name" class="form-control" value="{{ $user->name }}" disabled>
<input type="text" name="service" id="service" class="form-control" value="{{ $service->id }}" hidden>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" disabled>
</div>
@if ($comment !=null && $test)
      <input type="text" name="comment" id="email" class="form-control" value="{{ $comment->id }}" hidden>
@endif
</div>
<div class="col-md-12">
<div class="form-group">
<textarea name="message" id="message" class="form-control" rows="7" placeholder="Write Your Comment" required=""></textarea>
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
<button class="theme-btn br-30 mt-30" type="submit" data-loading-text="Please wait...">Valider</button>
</div>
</div>
</div>
</form>
</div>
@endif
</div>
</section>


<section class="service-page mb-120 rmb-70">
<div class="container">
<div class="section-title text-center mb-20">
<h2>Plus de services</h2>
<span class="line"></span>
</div>
<div class="row">
@foreach ($services as $ser)
<div class="col-lg-4 col-md-6">
      <div class="our-service-box">
            <div class="our-service-img">
                  <img src="/{{ $ser->image }}" alt="Service Image">
            </div>
            <div class="our-service-content">
                  <h3><a href="{{ route('service.show', $ser->id )}}">{{ $ser->nom }}</a></h3>
                  <span class="line"></span>
                  <p>{{ $ser->description }}</p>
                  <a href="{{ route('service.show', $ser->id )}}" class="theme-btn br-20">Plus de details</a>
            </div>
      </div>
</div>
@endforeach
</div>
</div>
</div>
</section>

@endsection