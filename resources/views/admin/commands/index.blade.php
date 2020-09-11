@extends('admin.commands.layout')
 
@section('content')
<div class="card m-b-30">

    <div class="row">
        <div class="col-lg-12 margin-tb pt-2 pb-4">
             <div class="text-center">
                <h2>Consulter tous les commands</h2>
            </div>
          
        </div>
    </div>
   
    @if ($success  != "")
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $success }}</p>
        </div>
    @endif

    <div class="card m-b-30">


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
                                        <th>Nom Client</th>
                                        <th>Email</th>
                                        <th>Produits</th>
                                        <th>Prix total</th>
                                        <th>Adresse</th>
                                        <th>Telephone</th>


                                        <th style="width: 70.2px;">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($commands as $command)
                                        <tr>
                                        <td>{{$command->id }}</td>
                                        <td>{{ $command->user->name }}</td>
                                        <td>{{$command->user->email}}</td>
                                        <td>
                                            <ul>
                                                @foreach ($command->cmdProduit as $prod )
                                                    
                                                    <li>Produit Numéro : {{$prod->produit_id}} ( Nom : {{ $prod->produit->nom }} ) <b> Quantite : {{ $prod->quantite }}</b>    </li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $command->prix_total }}</td>
                                        <td>{{ $command->adresse }}</td>
                                        <td>{{ $command->user->phone }}</td>

                                        <td>
                                        <form action="{{ route('admin.commands.destroy',$command->id) }}" method="POST">
                                                                                    
                                            <a class="btn4" href="{{ route('admin.commands.create',['email' => $command->user->email]) }}"><i class="fa fa-check"></i></a>                    

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