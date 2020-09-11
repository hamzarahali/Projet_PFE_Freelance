@extends('admin.categories.layout')
 
@section('content')
<div class="card m-b-30">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="text-center pb-4">
                <a class="btn btn-success" href="{{ route('admin.categories.create') }}"> Ajouter un categorie</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $message }}</p>
        </div>
    @endif
    <div class="card-body">
    <table class="table table-bordered table-striped ">
        <tr>
            <th>No</th>
            <th>Nom</th>
            
            <th width="250px">Action</th>

        </tr>
        @foreach ($categories as $categorie)
        <tr>
            <td>{{  $categorie->id }}</td>
            <td>{{ $categorie->nom }}</td>
            
            <td>
                <form action="{{ route('admin.categories.destroy',$categorie->id) }}" method="POST">
    
                    <a class="btn2" href="{{ route('admin.categories.edit',$categorie->id) }}"><i class="fas fa-pen"></i></a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn1"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  </div>
    {!! $categories->links() !!}
      
@endsection