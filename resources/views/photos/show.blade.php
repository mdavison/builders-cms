@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">View Photo Info</h1>

    @include('layouts.partials.flash-message')

    <div class="row">
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <a href="#" data-toggle="modal" data-target="#photoModal" data-toggle="tooltip" title="Click to view full size">
                    <img src="/galleryphotos/thumbnails/{{ $photo->filename }}"
                     alt="{{ $photo->filename }}"
                     class="img-responsive">
                </a>


            </div><!-- /.thumbnail -->
        </div>


        <!-- Modal -->
        <div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <img src="/galleryphotos/{{ $photo->filename }}"
                             alt="{{ $photo->filename }}">
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>



        <div class="col-md-6">
            <h4>Full Filename: {{ $photo->filename }}</h4>
            <h4>Uploaded: {{ $photo->created_at->diffForHumans() }}</h4>
            <h4>Gallery: {{ $photo->gallery->name }}</h4>
            <p><a href="/photos/{{ $photo->id }}/edit" class="btn btn-primary" role="button">Edit</a></p>
            {!! Form::open(array('method' => 'DELETE',
                'route' => array('photos.destroy', $photo->id),
                'class' => 'form-inline bootbox-confirm')) !!}
                {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                {!! Form::close() !!}

        </div>



    </div><!-- /.row -->

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