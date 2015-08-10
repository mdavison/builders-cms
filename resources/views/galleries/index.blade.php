@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">All Galleries</h1>

    @include('layouts.partials.flash-message')

    @if(count($galleries))

        @foreach($galleries as $gallery)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        @if ( $gallery->client)
                            <a href="#"
                               title="Click to change name"
                               class="x-editable bootstrap-tooltip"
                               data-type="text"
                               data-pk="{{ $gallery->id }}"
                               data-url="/galleries/{{$gallery->id}}/update-ajax"
                               data-name="name">
                                    {{ $gallery->name }}
                            </a>
                        @else
                            {{ $gallery->name }}
                        @endif
                    </h3>
                </div>
                <div class="panel-body">
                    <a href="/galleries/{{$gallery->link_token}}" class="btn btn-default">
                        <span class="glyphicon glyphicon-picture" aria-hidden="true"></span> View
                    </a>

                    <a href="/galleries/{{$gallery->id}}/sort" class="btn btn-default">
                        <span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span> Sort
                    </a>

                    @if ($gallery->client)
                        <a href="/galleries/{{$gallery->link_token}}" class="btn btn-default bootbox-share">
                            <span class="glyphicon glyphicon-share" aria-hidden="true"></span> Share Link
                        </a>


                        {!! Form::open(array('method' => 'DELETE',
                                             'route' => array('galleries.destroy', $gallery->id),
                                             'class' => 'bootbox-confirm pull-right')) !!}
                            <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                            </button>
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        @endforeach


    @else
        <p>There are no galleries.</p>
    @endif

@endsection


@section('style')
    <link href="/css/bootstrap-editable.css" rel="stylesheet">
@endsection

@section('script')
    <!-- Bootstrap tooltip -->
    <script>
        $(function () {
            $('.bootstrap-tooltip').tooltip()
        })
    </script>

    <!-- Bootbox for delete confirmation and share link -->
    <script src="/js/bootbox.min.js"></script>
    <script>
        $(".bootbox-confirm").click(function(e) {
            e.preventDefault();
            var confirmMessage = "Are you sure? This cannot be undone and will also delete all photos within this gallery.";
            bootbox.confirm(confirmMessage, function(confirmed) {
                if (confirmed) {
                    e.target.closest("form.bootbox-confirm").submit();
                }
            });
        });

        $(".bootbox-share").click(function(e){
            e.preventDefault();
            var message = "<strong>Copy this link to share a gallery:</strong><hr>" + e.target.href;
            bootbox.alert(message, function() {
                //console.log(e.target.href);
            });
        });
    </script>

    <!-- Inline Editing with X-editable -->
    <script src="/js/bootstrap-editable.min.js"></script>
    <script>
        //turn to inline mode
        $.fn.editable.defaults.mode = 'inline';

        $(document).ready(function() {
            $('.x-editable').editable(
                {
                    params: {
                        _token: "{{ csrf_token() }}"
                    },
                    error: function(response, newValue) {
                        if(response.status === 500) {
                            return 'Service unavailable. Please try later.';
                        } else {
                            return response.responseText;
                        }
                    },
                    validate: function(value) {
                        if($.trim(value) == '') {
                            return "You need to enter something."
                        }
                    }
                }
            );
        });
    </script>
@endsection