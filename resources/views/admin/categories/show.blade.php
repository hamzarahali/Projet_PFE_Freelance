@extends('admin.categories.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-4">
            <div class="pull-left">
                <h2> Consulter categorie</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.categories.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $categories->nom }}
            </div>
        </div>
       
    </div>
@endsection