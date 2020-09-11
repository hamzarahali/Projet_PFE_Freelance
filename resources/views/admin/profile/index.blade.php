@extends('admin.profile.layout')
 
@section('content')

          
    @if ($success != '')
        <div class="alert alert-success text-center">
            <p style="color: black;font-size: 20px;">{{ $success }}</p>
        </div>
    @endif
                            <div class="card-body">

                                <form  action="{{ route('admin.profile.edit', $user->id) }}" method="GET">
                                @csrf

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-username">Nom <span class="text-danger">*</span></label>

                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="name" value="{{ $user->name }}" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-username">Prénom <span class="text-danger">*</span></label>

                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-username" name="lastname" value="{{ $user->lastname }}" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-currency">Téléphone <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-currency" name="phone" value="{{ $user->phone }}" >
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-currency">Email <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="val-currency" name="email" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-currency">Nouveau mot de passe <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="val-currency" name="mdp" placeholder="Nouveau mot de passe">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label" for="val-currency">Confirmer le mot de passe <span class="text-danger">*</span></label>
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" id="val-currency" name="val-currency" placeholder="Confirmer nouveau mot de passe">
                                        </div>
                                    </div>
                                   
                                    
                                    <div class="form-group row pt-5">
                                        <label class="col-lg-3 col-form-label"></label>
                                        <div class="col-lg-8">
                                            <button type="submit" class="btn btn-primary" style="width: 200px;">Enregistrer</button>
                                        </div>
                                    </div>

                                    <

                                    
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- End XP Col -->

                </div>   
                <!-- End XP Row -->

            </div>
            
@endsection