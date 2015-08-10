@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">Sort Photos in {{ $gallery->name }} Gallery</h1>

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


@section('style')
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />

    <style>
        #sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
        #sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }

        .glyphicon-refresh-animate {
            -animation: spin .7s infinite linear;
            -webkit-animation: spin2 .7s infinite linear;
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg);}
            to { -webkit-transform: rotate(360deg);}
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg);}
            to { transform: scale(1) rotate(360deg);}
        }
    </style>
@stop


@section('script')
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

    <!-- Add touch support -->
    <script src="/js/jquery.ui.touch-punch.min.js"></script>

    <script>
        $(function() {
            $( "#sortable" ).sortable();
            $( "#sortable" ).disableSelection();

            $( "#update-sort" ).click(function(){
                var     idArray = [],
                        idString = "",
                        csrfToken = "{{ csrf_token() }}";

                // Remove any existing success/error messages
                $( ".flash-message" ).remove();

                // Loading icon
                $( "#update-sort" ).after( '<span class="loading-icon glyphicon glyphicon-refresh glyphicon-refresh-animate" aria-hidden="true" style="margin-left: 15px"></span>' );

                // Loop through all photos and put "id" attribute into array
                $( "#sortable li" ).each(function(){
                    var thisId = $(this).attr("id");
                    idArray.push(thisId);
                });
                idString = idArray.join(',');

                $.post(window.location, {ids: idString, '_token': csrfToken}, function(data){
                    //console.log(data);
                    if (data === 'true'){
                        // We can remove the loading icon and replace with success message
                        $( ".loading-icon" ).remove();
                        $( ".page-header" ).after('<p class="flash-message bg-success">Sort order updated</p>');
                    } else {
                        $( ".loading-icon" ).remove();
                        $( ".page-header" ).after('<p class="flash-message bg-danger">Unable to update</p>');
                    }
                });


            });
        });


    </script>
@stop