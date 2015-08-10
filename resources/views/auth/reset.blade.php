@extends('layouts.master-login')

@section('content')


    <form class="form-signin" role="form" method="POST" action="/password/reset">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="token" value="{{ $token }}">

    <h2 class="form-signin-heading">Reset Password</h2>

    @include('layouts.partials.flash-message')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::label('email', 'Email: ', ['class' => 'sr-only']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'autofocus', 'required']) !!}

    {!! Form::label('password', 'Password: ', ['class' => 'sr-only']) !!}
    {!! Form::password('password', ['class' => 'form-control before-password-confirmation', 'placeholder' => 'Password', 'required']) !!}

    {!! Form::label('password_confirmation', 'Confirm Password: ', ['class' => 'sr-only']) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control password-confirmation', 'placeholder' => 'Confirm Password', 'required']) !!}

    {!! Form::button('Reset Password', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) !!}

    {!! Form::close() !!}

@stop