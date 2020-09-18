@if (Session::has('succes'))
<div class="clearfix mb-4">
    <div class="float-right">
        <div class="alert alert-success" role="alert">
            <strong>Success</strong>{{Session::get('succes')}}
        </div>  
    </div>
</div>
 
@endif
@if (count($errors)>0)
<div class="clearfix mb-4">
    <div class="float-right">
        <div class="alert alert-danger" role="alert">
            <strong>Errors::</strong>
            <ul>
                   @foreach ($errors->all() as $error)
                   <li>{{$error}}</li>
                   @endforeach
            </ul>
        </div>
    </div>
</div> 
@endif