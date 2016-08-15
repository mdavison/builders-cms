@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Manage Carousel Photos</h1>

    @include('layouts.partials.flash-message')

    @if ($photos->count())
        <a href="#" id="update-sort" class="btn btn-primary">Update</a>

        <ul id="sortable">
            @foreach ($photos as $photo)
                <li id="{{ $photo->id }}"><img src="/galleryphotos/thumbnails/{{ $photo->filename }}" alt="" class="img-responsive img-thumbnail"></li>
            @endforeach
        </ul>

    @else
        <p>No photos</p>
    @endif


@endsection


@include('layouts.partials.js-photo-sort-styles')


@include('layouts.partials.js-photo-sort')