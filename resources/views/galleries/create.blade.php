@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Create a new client gallery</h1>

    @include('layouts.partials.flash-message')

    {!! Form::open(['route' => 'galleries.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Client Name: ') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'autofocus']) !!}
        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::button('Create Gallery', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}


@endsection