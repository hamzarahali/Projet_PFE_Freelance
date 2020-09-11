@extends('admin.contacts.layout')
 
@section('content')

@if ($message != '')
<div class="alert alert-success text-center">
    <p style="color: black">{{ $message }}</p>
</div>
@endif

@if ( $msg != '' ) 
<div class="text-center" style="color: black;
    padding: 2rem 0rem;
    margin: 0rem 20rem 2rem;
    background: #4aaaba
    ">
  <h4>{{ $msg }}</h4>
</div>

@endif

<div class="row">


<div class="col-lg-2"></div>
<div class="col-lg-8">
    <div class="xp-email-rightbar">
        <div class="card m-b-30">
            <div class="card-header bg-white text-center">
             


                <h5 class="card-title text-black">Nouveau Message</h5>
            </div>
            <div class="card-body"> 
                                                 
            <form action="{{ route('admin.reponse',['mail'=>$email])}}" method="POST">
            @csrf

                  <div class="form-group row">
                    <label for="emailTo" class="col-sm-2 col-form-label">À</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="emailTo" placeholder="{{ $email }}" disabled>
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="emailCc" class="col-sm-2 col-form-label">CC</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="emailCc" placeholder="CC">
                    </div>
                  </div> -->
                 
                  <div class="form-group row">
                    <label for="emailSubject" class="col-sm-2 col-form-label">Objet</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="emailSubject" placeholder="Objet">
                    </div>
                  </div>                                      
                  <div class="form-group row">
                        <label for="emailSubject" class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" style="height: 200px"  name="msg" placeholder="message"></textarea>
</div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary form-control">Repondre</button>
                     
                    </div>
                    <div class="col-sm-4"></div>
                  </div>
                  
                </form>
                

</div>
</div>
<div class="col-lg-2"></div>
@endsection