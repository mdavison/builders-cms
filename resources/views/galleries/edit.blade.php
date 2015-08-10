@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Edit Gallery</h1>

    @include('layouts.partials.flash-message')

    {!! Form::model($gallery, ['route' => ['galleries.update', $gallery->id], 'method' => 'PATCH']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Client Name: ') !!}

        @if($gallery->slug === 'carousel' OR
            $gallery->slug === 'interior' OR
            $gallery->slug === 'exterior')
            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
        @else
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @endif

        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}


@endsection