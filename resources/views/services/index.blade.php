@extends('layouts.content')

@section('body')
    
<section class="banner-section">
<div class="container">
<div class="banner-inner text-center pt-55">
<h2 class="page-title">Services</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Acceuil</a></li>
<li class="breadcrumb-item active" aria-current="page">Services</li>
</ol>
</nav>
</div>
</div>
</section>


<section class="we-provide mt-150 rmt-100 mb-135 rmb-90">
<div class="container">
<div class="we-provide-inner">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="we-provide-img">
<img src="assets/images/service/eng.png" alt="We Provide">
</div>
</div>
<div class="col-lg-6">
<div class="we-provide-content">
<div class="section-title">
<h2>Nos engagements</h2>
<span class="line"></span>
</div>

<ul class="list-style-one">
<li>Fiabilité</li>
<li>Efficacité</li>
<li> Meilleure qualité</li>
<li>Assistance H24 7J/7</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="service-page mb-110 rmb-60">
<div class="container">
<div class="section-title text-center mb-20">
	
<h2>Nos services</h2>
<span class="line"></span>
</div>
<div class="row">
@foreach ($services as $service)
<div class="col-lg-4 col-md-6">
    <div class="our-service-box">
        <div class="our-service-img">
            <img src="/{{ $service->image }}" style="border-radius: 10px 10px 0 0;" alt="Service Image">
        </div>
        <div class="our-service-content">
            <h3><a href="{{ route('service.show',$service->id )}}">{{ $service->nom }}</a></h3>
            <span class="line"></span>
            <p>{{ $service->description }}</p>
            <a href="{{ route('service.show',$service->id )}}" class="theme-btn br-20">Plus de details</a>
        </div>
    </div>
</div>
@endforeach
</div>
</div>
</div>
</section>


<section class="how-work text-center mb-95 rmb-50">
<div class="container">
<div class="section-title">
<h2>Comment ça marche</h2>
<span class="line"></span>
</div>
<div class="row">
<div class="col-md-4">
<div class="work-box">
<span class="work-number">1</span>
<h3>Commander le service</h3>
<span class="line"></span>
<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper laoreet, lectus arcu pulvinar risus, vitae.</p>
</div>
</div>
<div class="col-md-4">
<div class="work-box dashed">
<span class="work-number">2</span>
<h3>Installation</h3>
<span class="line"></span>
<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper laoreet, lectus arcu pulvinar risus, vitae.</p>
</div>
 </div>
<div class="col-md-4">
<div class="work-box">
<span class="work-number">3</span>
<h3>Assurez votre sécurité</h3>
<span class="line"></span>
<p>Morbi interdum mollis sapien. Sed ac risus. Phasellus lacinia, mag ullamcorper laoreet, lectus arcu pulvinar risus, vitae.</p>
</div>
</div>
</div>
</div>
</section>


<section class="our-pricing text-center mb-150 rmb-100">
<div class="container">
<div class="section-title">

</div>
</div>
</div>
</div>
</section>

@endsection