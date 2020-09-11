@extends('layouts.content')

@section('body')

<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Devis</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Devis</li>
</ol>
</nav>
</div>
</div>
</section>



@if ($success != '')
<div class="mt-50 text-center alert alert-success" style="margin-left: 100px; margin-right: 100px; color: black">
    <h4> {{$success}} </h4>
</div>
@endif

<section class="contact-form mt-50 rmt-90 mb-150 rmb-100">
<div class="container">
<div class="section-title text-center">
<h2>Demander un devis</h2>
<span class="line"></span>
<h5 style="font-size: 20px;">Contactez-nous pour toute demande, nous vous répondrons dans les plus brefs délais!</h5>

</div>

<br>

<form id="contact-form" name="contact_form" class="contact-form" action="{{ route('devis.store') }}" method="POST">
@csrf

<div class="row clearfix">
<div class="col-md-6">
<div class="form-group">
<label for="name">Nom Complet</label>
<input type="text" name="first_name" id="name" class="form-control" placeholder="Nom et Prénom" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="email">Email</label>
<input type="email" name="email" id="email" class="form-control"placeholder="Adresse éléctronique" required>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="société">Nom société</label>
<input type="text" name="societe" id="subject" class="form-control" placeholder="Nom société">
</div>
</div>
<div class="col-md-6">
	<div class="form-group">
<label for="select">Services</label>

@if ($serviceDevis == null)
<select id="catégorie" name="service_id">
    @foreach ($services as $service)
		<option value="{{ $service->id }}">{{ $service->nom }}</option>
    @endforeach
</select>
@else

<select id="catégorie" name="service_id">
		<option value="{{ $serviceDevis->id }}">{{ $serviceDevis->nom }}</option>
</select>
@endif
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="phone">Telephone</label>
<input type="text" name="phone" id="phone" class="form-control" placeholder="Numero de téléphone">
</div>
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
<center><button class="theme-btn br-30" type="submit">Envoyer</button></center>
</div>
</form>


</div>
</section>

@endsection