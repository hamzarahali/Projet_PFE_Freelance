@if($message =Session::get('success'))
{{ $message }}
@endif



<form action="{{ route('admin.devis.send') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>message:</strong>
                <textarea class="form-control" style="height:280px" name="msg" placeholder="message"></textarea>
            </div>
        </div>
       
    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>