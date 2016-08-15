@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Edit Gallery</h1>

    @include('layouts.partials.flash-message')

    {!! Form::model($gallery, ['route' => ['galleries.update', $gallery->id], 'method' => 'PATCH']) !!}

    <div class="form-group">
        <?php $type = $gallery->client == 1 ? 'client' : 'public'; ?>
        {!! Form::select('type', array('client' => 'Client', 'public' => 'Public'), $type); !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Gallery Name: ') !!}

        @if($gallery->slug === 'carousel')
            {!! Form::text('name', null, ['class' => 'form-control', 'disabled']) !!}
        @else
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        @endif

        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
    </div>

    {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

    {!! Form::close() !!}


@endsection