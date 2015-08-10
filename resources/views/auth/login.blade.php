@extends('layouts.master-login')

@section('content')


    {!! Form::open(['url' => '/auth/login', 'class' => 'form-signin']) !!}
    <h2 class="form-signin-heading">Please sign in</h2>

    @include('layouts.partials.flash-message')

    {!! Form::label('email', 'Email: ', ['class' => 'sr-only']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'autofocus', 'required']) !!}

    {!! Form::label('password', 'Password: ', ['class' => 'sr-only']) !!}
    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password', 'required']) !!}

    <div class="checkbox">
        <label>
            {!! Form::checkbox('remember') !!} Remember me
        </label>
    </div>

    {!! Form::button('Sign In', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) !!}

    {!! Form::close() !!}

    <p class="form-signin">{!! link_to('/password/email', 'I forgot my password') !!}</p>


@stop