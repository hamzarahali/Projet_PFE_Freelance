@extends('admin.formations.layout')
 
@section('content')
<div class="card m-b-30">
    <div class="row">
        <div class="col-lg-12 margin-tb pt-2">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="text-center pb-4">
                <a class="btn btn-success" href="{{ route('admin.formations.create') }}"> Ajouter un formation</a>
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
        <th>Description</th>
    
        <th width="250px">Action</th>

    </tr>
</thead>
<tbody>
@foreach ($formations as $formation)
    <tr>
        <td>{{$formation->id }}</td>
        <td>{{ $formation->nom }}</td>
        <td>                <img src="/{{ $formation->image }}" style="width: 5rem; height: 5rem;"></td>
        <td>{{ $formation->description }}</td>
    
        <td>
            <form action="{{ route('admin.formations.destroy',$formation->id) }}" method="POST">
            
                <a class="btn2" href="{{ route('admin.formations.edit',$formation->id) }}"><i class="fas fa-pen"></i></a>

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