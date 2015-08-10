@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Upload a new photo</h1>

    @include('layouts.partials.flash-message')

    {!! Form::open(['route' => 'photos.store', 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('photo', 'Photo: ') !!}
        {!! Form::file('photo', ['class' => 'form-control']) !!}
        {!! $errors->first('photo', '<span class="text-danger">:message</span>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('gallery', 'Gallery: ') !!}
        {!! Form::select('gallery', $galleries, null, ['class' => 'form-control']) !!}
        {!! $errors->first('gallery', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::button('Upload', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}

    <hr>

    <p class="text-muted">Note: if you would like a photo to be in more than one gallery, just upload the same photo again into another gallery.</p>

@endsection