@if (\Session::get("success"))
    <div  class="alert alert-success text-center">
        <p>{{\Session::get("success")}}</p>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-3">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    </div>
@endif
