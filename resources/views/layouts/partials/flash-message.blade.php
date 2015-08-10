@if(Session::has('message'))
    <p class="flash-message alert alert-success">{!! Session::get('message') !!}</p>
@endif
@if(Session::has('error'))
    <p class="flash-message alert alert-danger">{{ Session::get('error') }}</p>
@endif

@if (count($errors) > 0)
    <ul class="flash-message alert alert-danger list-unstyled">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif