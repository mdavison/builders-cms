@extends('layouts.master-login')

@section('content')


    {!! Form::open(['url' => '/password/email', 'class' => 'form-signin']) !!}
    <h2 class="form-signin-heading">Reset Password</h2>

    @include('layouts.partials.flash-message')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {!! Form::label('email', 'Email: ', ['class' => 'sr-only']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email address', 'autofocus', 'required']) !!}

    {!! Form::button('Send Password Reset Link', ['type' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']) !!}

    {!! Form::close() !!}

@stop