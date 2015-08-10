@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Edit Photo</h1>

    @include('layouts.partials.flash-message')

    <div class="row">
        <div class="col-md-3">
            <img src="/galleryphotos/thumbnails/{{ $photo->filename }}"
                 alt="{{ $photo->filename }}"
                 class="img-responsive img-thumbnail">
        </div>

        <div class="col-md-4">

            {!! Form::open(['route' => ['photos.update', $photo->id], 'method' => 'PATCH']) !!}

            <div class="form-group">
                {!! Form::label('gallery', 'Gallery: ') !!}
                {!! Form::select('gallery', $galleries, $photo->gallery_id, ['class' => 'form-control']) !!}
                {!! $errors->first('gallery', '<span class="text-danger">:message</span>') !!}
            </div>

            {!! Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-default']) !!}

            {!! Form::close() !!}
        </div>
    </div><!-- /.row -->

@endsection