@extends('admin.demandeformation.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-4 pt-2">
            <div class="pull-left">
                <h2> Consulter demande formation numéro {{ $demandeformation->id }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.demandeformation.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $demandeformation->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $demandeformation->email }}
            </div>
        </div>
   
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>formation:</strong>
                {{ $demandeformation->formation->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>message:</strong>
                {{ $demandeformation->message  }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>telephone:</strong>
                {{ $demandeformation->telephone }}
            </div>
        </div>
    </div>
@endsection