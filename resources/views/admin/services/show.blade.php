@extends('admin.services.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-4">
            <div class="pull-left">
                <h2> Consulter service</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.services.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/{{ $services->image }}" style="width: 10rem; height: 10rem;">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $services->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Benefice:</strong>
                {{ $services->benefice }}
            </div>
        </div>
   
    </div>
@endsection