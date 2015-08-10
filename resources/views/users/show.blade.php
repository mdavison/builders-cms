@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">{{ $user->name }}</h1>

    @include('layouts.partials.flash-message')

    <ul>
        <li>{{ $user->email }}</li>
    </ul>

@endsection