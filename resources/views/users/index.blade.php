@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">All Users</h1>

    @include('layouts.partials.flash-message')

    @if(count($users))
        <table class="table">
            <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{!! link_to("/users/{$user->id}/edit", 'Edit') !!}</td>

                    <td>
                        {!! Form::open(array('method' => 'DELETE',
                                             'route' => array('users.destroy', $user->id),
                                             'class' => 'bootbox-confirm')) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>There are no users.</p>
    @endif

@endsection

@section('script')
    <!-- Bootbox for delete confirmation -->
    <script src="/js/bootbox.min.js"></script>
    <script>
        $(".bootbox-confirm").click(function(e) {
            e.preventDefault();
            bootbox.confirm("Are you sure? This cannot be undone.", function(confirmed) {
                if (confirmed) {
                    $('.bootbox-confirm').submit();
                }
            });
        });
    </script>
@endsection