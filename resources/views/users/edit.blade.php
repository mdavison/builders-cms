@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Edit {{ $user->name }}</h1>

    @include('layouts.partials.flash-message')

    {!! Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PATCH')) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password: ') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation', 'Confirm Password: ') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        {!! $errors->first('password_confirmation', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}

@endsection