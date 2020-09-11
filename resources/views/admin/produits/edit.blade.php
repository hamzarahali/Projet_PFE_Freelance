@extends('admin.produits.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb pb-5">
            <div class="pull-left">
                <h2>Modifier produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.produits.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('admin.produits.update',$produits->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nom:</strong>
                    <input type="text" name="nom" value="{{ $produits->nom }}" class="form-control" placeholder="Nom">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 1 :</strong>
                        <input type="file" name="image1" data-input="false" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 2 :</strong>
                        <input type="file" name="image2" data-input="false" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 3 :</strong>
                        <input type="file" name="image3" data-input="false" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image 4 :</strong>
                        <input type="file" name="image4" data-input="false" class="form-control">
                    </div>
                </div>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="label">Catégorie</label>
                    <select name="categorie_id">
                        <option value="{{ $produits->categorie->id }}" disabled> {{ $produits->categorie->nom }}</option>
                        <option disabled> ----------------------</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $produits->description }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Marque :</strong>
                    <input type="text" name="marque" value="{{ $produits->marque }}" class="form-control" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantite:</strong>
                    <input type="text" name="quantite" value="{{ $produits->quantite }}" class="form-control" placeholder="Quantite">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prix:</strong>
                    <input type="text" name="prix" value="{{ $produits->prix }}" class="form-control" placeholder="Prix">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Modifier le produit</button>
            </div>
        </div>
   
    </form>
@endsection