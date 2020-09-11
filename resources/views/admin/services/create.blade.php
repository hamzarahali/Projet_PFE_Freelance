@extends('admin.services.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb pb-5">
        <div class="pull-left">
            <h2>Ajouter un Service</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin.services.index') }}"> Retour</a>
        </div>
    </div>
</div>
   
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

<form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" class="form-control" placeholder="Nom">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 1 :</strong>
                        <input type="file" name="image" class="form-control" placeholder="Image" data-input="false">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 2 :</strong>
                        <input type="file" name="image2" class="form-control" placeholder="Image" data-input="false">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:280px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Benefice:</strong>
                <textarea class="form-control" style="height:280px" name="benefice" placeholder="Benefice"></textarea>
            </div>
        </div>
    
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Créer un service</button>
        </div>
    </div>
   
</form>
@endsection