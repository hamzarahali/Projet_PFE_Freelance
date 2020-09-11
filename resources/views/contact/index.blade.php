
@extends('layouts.content')
@section('body')



<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Contact</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Contact</li>
</ol>
</nav>
</div>
</div>
</section>

@if ($success != '')
        <div class="alert alert-success text-center" style="margin: 2rem 5rem;
    font-size: 20px;">
            <p style="color: black;font-size: 25px;">{{ $success }}</p>
        </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Warning!</strong> Please check your input code<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="contact-info-map mt-150 rmt-100 mb-140 rmb-90">
<div class="container">
<div class="contact-info-map-inner bg-white br-10">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="contact-info pl-50 pr-20 pt-40 pb-30">
<div class="section-title">
<h2>Contactez-nous</h2>
<span class="line"></span>
</div>
<p>Pour toutes informations, veuillez remplir le formulaire ci-dessous.</p>
<ul class="list-style-two">
<li><i class="fas fa-phone-alt"></i> +216 25-375-860</li>
 <li><i class="fas fa-envelope"></i> Contact-sitte@topnet.tn </li>
<li><i class="fas fa-map-marker-alt"></i> Centre urbain nord, Immeuble Yasmine Tower <br>Bureau A5-8, Tunis </li>
</ul>
</div>
</div>
<iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3192.8106500507456!2d10.195189040147158!3d36.84701063858356!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd34c633822983%3A0x815ce59e88baf537!2sYasmine%20Tower%2C%20Boulevard%20de%20la%20Terre%2C%20Tunis!5e0!3m2!1sfr!2stn!4v1588295914391!5m2!1sfr!2stn" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="contact-form mt-135 rmt-90 mb-150 rmb-100">
<div class="container">
<div class="section-title text-center">
<h2>Entrez en contact avec nous</h2>
<span class="line"></span>
</div>


<form id="contact-form" name="contact_form" class="contact-form"  action="{{ route('contactpage.store') }}" method="POST">
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
<label for="subject">Sujet</label>
<input type="text" name="sujet" id="subject" class="form-control" placeholder="Sujet">
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
<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
<center><button class="theme-btn br-30" type="submit" data-loading-text="veuillez patienter...">Envoyer</button></center>
</div>
</form>

</div>
</section>
@endsection