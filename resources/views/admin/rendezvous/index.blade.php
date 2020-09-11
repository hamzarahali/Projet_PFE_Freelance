@extends('admin.rendezvous.layout')
 
@section('content')
<div class="card m-b-30">

    <div class="row">
        <div class="col-lg-12 margin-tb pt-2 pb-4">
             <div class="text-center">
                <h2>Consulter tous les Rendez vous</h2>
            </div>
          
        </div>
    </div>
   
    @if ($success  != "")
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $success }}</p>
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
<th>Client</th>
<th>Service</th>
<th>Date</th>
<th>Heure</th>
<th>Adresse</th>


<th>Action</th>

</tr>
</thead>
<tbody>
@foreach ($rvs as $rv)
<tr>
<td>{{$rv->user->email }}</td>
<td>{{$rv->service->nom }}</td>
<td>{{$rv->date}}
<td>{{$rv->heure}}</td>
<td>{{ $rv->adresse }}</td>

<td>
    <form action="{{ route('admin.rendezvous.destroy',$rv->id) }}" method="POST">
    @csrf
                                                                                                        @method('DELETE')                                                 
    <a class="btn4" href="{{ route('admin.rendezvous.create',['email' => $rv->user->email]) }}"><i class="fa fa-check"></i></a>
                                        
                                                                                                  
                                        
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