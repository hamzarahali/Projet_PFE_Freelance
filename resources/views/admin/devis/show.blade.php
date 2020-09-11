@extends('admin.devis.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pt-2 pb-4">
            <div class="pull-left ">
                <h2> Consulter devis numéro {{ $devis->id }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.devis.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $devis->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $devis->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>nom de l'entreprise:</strong>
                {{ $devis->entreprisename }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>categorie:</strong>
                {{ $devis->categorie->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>message:</strong>
                {{ $devis->message  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>telephone:</strong>
                {{ $devis->telephone }}
            </div>
        </div>
    </div>
@endsection