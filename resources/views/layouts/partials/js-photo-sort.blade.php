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