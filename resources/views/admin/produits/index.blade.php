@extends('admin.produits.layout')
 
@section('content')
<div class="card m-b-30">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="text-center pb-4">
                <a class="btn btn-success" href="{{ route('admin.produits.create') }}"> Ajouter Produit</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $message }}</p>
        </div>
    @endif
    
  
    <div class="col-lg-12">
                            <div class="card m-b-30">

                                <div class="card-header bg-white">
                                    <h5 class="card-title text-black">Export</h5>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                    
                                        <table id="datatable-buttons" class="table table-striped table-bordered">
                                    
                                        <thead>


                                            <tr>
                                            <th>No</th>
                                            <th>Nom</th>
                                            <th>Image</th>
                                            <th>Categorie</th>
                                            <th>Description</th>
                                            <th>Marque</th>
                                            <th>Quantite</th>
                                            <th>Prix</th>
                                            <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($produits as $produit)
                                                <tr>
                                                    <td>{{$produit->id }}</td>
                                                    <td>{{ $produit->nom }}</td>
                                                    
                                                    <td>
                                                    @foreach ($produit->medias as $media)
                                                        @if ($media->type == 'image1' )
                                                            <img src="/{{ $media->path }}" style="width: 5rem; height: 5rem;">
                                                        @endif
                                                    @endforeach
                                                    </td>
                                                    <td>{{ $produit->categorie->nom }}</td>

                                                    <td>{{ $produit->description }}</td>
                                                    <td>{{ $produit->marque }}</td>
                                                    <td>{{ $produit->quantite }}</td>
                                                    <td>{{ $produit->prix }}</td>
                                                    <td>
                                                        <form action="{{ route('admin.produits.destroy',$produit->id) }}" method="POST">
                                                                                    
                                                            <a class="btn2" href="{{ route('admin.produits.edit',$produit->id) }}"><i class="fas fa-pen"></i></a>

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn1"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                        </table>  
                                         
                                    </div>
                                </div>
                            </div>
    </div>

@endsection

