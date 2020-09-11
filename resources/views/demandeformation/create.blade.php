@extends('layouts.content')
  
@section('body')



<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Réservation</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Acceuil</a></li>
<li class="breadcrumb-item"><a href="index-2.html">Formation</a></li>
<li class="breadcrumb-item active" aria-current="page">Réservation</li>
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

<section class="contact-form mt-50 rmt-90 mb-150 rmb-100">
<div class="container">
<div class="section-title text-center">
<h2>Garantissez votre place !</h2>
<span class="line"></span>
</div>
<br>

<form id="contact-form" name="contact_form" class="contact-form" action="{{ route('demandeformation.store') }}" method="POST">
@csrf
<div class="row clearfix">
<div class="col-md-6">
<div class="form-group">
<label for="name">Nom Complet</label>
<input type="text" name="nom" id="name" class="form-control" value="" placeholder="Nom et Prénom" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control" value="" placeholder="Adresse éléctronique" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="phone">Telephone</label>
<input type="text" name="phone" id="phone" class="form-control" placeholder="Numero de téléphone">
</div>
</div>
<div class="col-md-6">
	<div class="form-group">
<label for="select">Type formation</label>
<select id="catégorie" name="formation_id">
    @foreach ($formations as $formation)
		<option value="{{ $formation->id }}">{{ $formation->nom }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<label for="message">Message</label>
<textarea name="message" id="message" class="form-control" rows="7" placeholder="Message" required></textarea>
</div>
</div>
</div>
<div class="form-group text-right mt-20 mb-0">
<center><button class="theme-btn br-30" type="submit" >Réserver</button></center>
</div>
</form>

</div>
</section>

@endsection