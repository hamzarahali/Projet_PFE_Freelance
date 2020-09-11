@extends('layouts.content')

@section('body')

<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Rendez-vous</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html">Acceuil</a></li>
<li class="breadcrumb-item"><a href="index-2.html">Services</a></li>
<li class="breadcrumb-item active" aria-current="page">Rendez-vous</li>
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

<section class="contact-form mt-50 rmt-90 mb-150 rmb-100">
<div class="container">
<div class="section-title text-center">
<h2>Prenez un rendez-vous</h2>
<span class="line"></span>
</div>

<form id="contact-form" name="contact_form" class="contact-form" action="{{ route('rendezvous.store') }}" method="POST">
@csrf
    <div class="row clearfix">
        <input type="service_id" name="service" value="{{ $service->id }} " hidden>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Date du rendez-vous</label>
                <input type="date" name="date" id="name" class="form-control" placeholder="Nom et Prénom" required>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label></label>
                <input type="submit" value="Envoyer" class="form-control btn btn-info" style="background-color: #007bff;
                color: white;">
            </div>
        </div>
    </div>
</form>

@if ($test != 0 && $heures != null) 
<form id="contact-form" name="contact_form" class="contact-form" action="{{ route('storerendezvous.store') }}" method="POST">
@csrf
            <input type="service_id" name="service" value="{{ $service->id }} " hidden>
        <input type="date" name="date" value="{{ $date }}">
        <div class="form-group">
            <label for="name">Heure du rendez-vous</label><br><br>
                @if ($heures == [] && $testh == 0) 
                    <input type="radio" id="heure" name="heure" value="9">
                    <label >9h:00</label> &nbsp 
                    <input type="radio" id="heure" name="heure" value="10">
                    <label >10h:00</label> &nbsp 
                    <input type="radio" id="heure" name="heure" value="11">
                    <label>11h:00</label> &nbsp 
                    <input type="radio" id="heure" name="heure" value="12">
                    <label >12h:00</label> &nbsp 
                @endif
                @if ($heures != []) 
                    @foreach ($heures as $heure)
                            <input type="radio" id="heure" name="heure" value="{{ $heure }}">
                            <label >{{ $heure }}h:00</label> &nbsp 
                    @endforeach
                @endif
        </div>
        <div class="form-group">
            <label>Adresse : </label>
            <input type="text" name="adresse"  class="form-control" id="" placeholder="Saisir votre Adresse" required>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="form-group">
                <label></label>
                <input type="submit" value="Envoyer" class="form-control btn btn-primary" style="background-color: #007bff;
                color: white;">
        </div>
            </div>
            <div class="col-md-4"></div>
        </div>
        
</form>
@elseif ($test != 0 )
    <h5 class="alert alert-danger text-center"> Date n'est pas disponible..! Choissisez une autre date</h5>
@endif
<!-- 
<div class="col-md-6">
    
</div>


<input type="text" name="adresse" class="form-control" placeholder="Adresse">
 <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
		<div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
        var setting = {"height":531,"width":792,"zoom":13,"queryString":"Le Bardo, Tunisie","place_id":"ChIJ89wkbKUz_RIRvtx5WMe9WGc","satellite":false,"centerCoord":[36.812635396995475,10.137706450000001],"cid":"0x6758bdc75879dcbe","lang":"fr","cityUrl":"/tunisia/le-bardo-280177","cityAnchorText":"Carte de Le Bardo, Tunisia 2, Tunisie","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"250559"};
        var d = document;
        var s = d.createElement('script');
        s.src = 'https://1map.com/js/script-for-user.js?embed_id=250559';
        s.async = true;
        s.onload = function (e) {
          window.OneMap.initMap(setting)
        };
        var to = d.getElementsByTagName('script')[0];
        console.log(to);
        to.parentNode.insertBefore(s, to);
      })();</script><a href="https://1map.com/fr/map-embed">1 Map</a></div>
      <br> 
      <br>
      <br>
    </div>
      <div class="form-group row">
          <div class="col-md-4"></div>
          <div class="col-md-4">
              <br><br>
                <input type="button" value="Envoyer" class="form-control btn btn-primary">

          </div>
          <div class="col-md-4"></div>
      </div>


</form> -->

</div>
</section>
@endsection