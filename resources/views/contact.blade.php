@extends('layouts/master')

@section('content')
    <h1>Contact Us</h1>

    @include('layouts.partials.flash-message')

    {!! Form::open() !!}

    <div class="form-group">
        {!! Form::label('name', 'Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email: ') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('subject', 'Subject: ') !!}
        {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'Subject']) !!}
        {!! $errors->first('subject', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('msg', 'Message: ') !!}
        {!! Form::textarea('msg', null, ['class' => 'form-control', 'placeholder' => 'Message']) !!}
        {!! $errors->first('msg', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::text('last-name', null, ['id' => 'last-name']) !!}

    {!! Form::button('Send', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}
@stop
