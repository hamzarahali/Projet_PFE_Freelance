@extends('admin.contacts.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pt-2 pb-4">
            <div class="pull-left">
                <h2> Consulter contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.contacts.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $contacts->nom }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $contacts->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>telephone:</strong>
                {{ $contacts->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sujet:</strong>
                {{ $contacts->sujet }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>message:</strong>
                {{ $contacts->message }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <a href="{{ route ('admin.repondre', $contacts->email )}}"> répondre</a>
            </div>
        </div>
    
    </div>
@endsection