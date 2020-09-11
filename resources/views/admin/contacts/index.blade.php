@extends('admin.contacts.layout')
 
@section('content')
<div class="card m-b-30">

    <div class="row">
        <div class="col-lg-12 margin-tb pt-2 pb-4">
            <div class="text-center">
                <h2>Consulter tous les contacts</h2>
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
                                        <th>Telephone</th>
                                        <th>Sujet</th>
                                        <th>Message</th>


                                        <th>Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($contacts as $contact)
                                        <tr>
                                        <td>{{$contact->id }}</td>
                                        <td>{{$contact->nom }}</td>
                                        <td>{{$contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->sujet }}</td>
                                        <td>{{ $contact->message }}</td>

                                        <td>
                                            <a class="btn4" href="/repondre?mail={{$contact->email}}&model=Contact&id={{ $contact->id}}"><i class="fa fa-reply"></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                            </tbody>
                                        </table>  
                                         
                                    </div>
    </div>
      
      
@endsection