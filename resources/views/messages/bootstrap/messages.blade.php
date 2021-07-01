@if(session()->has('success'))
    <div class="alert alert-success my-5">
        {{session()->get('success')}}
    </div>
@endif

@if(session()->has('warning'))
    <div class="alert alert-warning my-5">
        {{session()->get('warning')}}
    </div>
@endif


@if(session()->has('danger'))
    <div class="alert alert-danger my-5">
        {{session()->get('danger')}}
    </div>
@endif
