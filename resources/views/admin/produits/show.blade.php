@extends('admin.produits.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-5">
            <div class="pull-left">
                <h2> Voir produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.produits.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $produits->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/{{ $produits->image }}" style="width: 10rem; height: 10rem;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $produits->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                {{ $produits->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantite:</strong>
                {{ $produits->quantite }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                {{ $produits->prix }}
            </div>
        </div>
    </div>
@endsection