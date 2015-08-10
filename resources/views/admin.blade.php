@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Admin Dashboard</h1>

    @include('layouts.partials.flash-message')

    <h3>Recent Activity</h3>

    @if(count($activities))
        <ul class="list-group">

            @include('activities.list')

        </ul>

    @else
        <p>No activity</p>

    @endif




@endsection