@extends('admin.devis.layout')
 
@section('content')
<div class="card m-b-30">

    <div class="row">
        <div class="col-lg-12 margin-tb pb-4 pt-2">
            <div class="text-center">
                <h2>Consulter tous les devis</h2>
            </div>
          
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $message }}</p>
        </div>
    @endif

    <div class="card m-b-30">

</div>    <div class="col-lg-12">
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
                                            <th>Email</th>
                                            <th>Non de l'entreprise</th>
                                            <th>Service</th>
                                            <th>Message</th>
                                            <th>Telephone</th>


                                            <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($devis as $dev)
                                            <tr>
                                            <td>{{$dev->id }}</td>
                                            <td>{{$dev->nom }}</td>
                                            <td>{{$dev->email }}</td>
                                            <td>{{ $dev->entreprisename }}</td>
                                            <td>{{ $dev->service->nom }}</td>
                                            <td>{{ $dev->message }}</td>
                                            <td>{{ $dev->telephone }}</td>
                                            <td>
                                            <a class="btn4" href="/repondre?mail={{$dev->email}}&model=Devis&id={{ $dev->id}}"><i class="fa fa-reply"></i></a>
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