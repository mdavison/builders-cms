@extends('layouts.master-admin')

@section('content')

    <h1 class="page-header">All Photos</h1>

    <p class="align-right"><span class="glyphicon glyphicon-picture"></span> Carousel</p>

    @include('layouts.partials.flash-message')

    @if(count($photos))
        <div class="row" id="masonry-container">
            @foreach($photos as $photo)
            <div class="col-sm-4 col-md-3 masonry-item">
                <div class="thumbnail">

                    <a href="/photos/{{ $photo->id }}" data-toggle="tooltip" title="{{ $photo->filename }}" >
                        <img src="/galleryphotos/thumbnails/{{ $photo->filename }}"
                             alt="{{ $photo->filename }}"
                             class="img-responsive">
                    </a>

                    <div class="caption">
                        {{ $photo->gallery->name }}

                        @if($photo->carousel)
                            <p class="pull-right"><span class="glyphicon glyphicon-picture"></span></p>
                        @endif
                    </div><!-- /.caption -->
                </div><!-- /.thumbnail -->
            </div>
            @endforeach
        </div><!-- /.row -->
    @else
        <p>There are no photos.</p>
    @endif

@endsection

@section('script')
    <!-- Bootstrap tooltip -->
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Masonry for nice image layout -->
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script>
        $(document).ready(function(){
            var $container = $('#masonry-container');

            $container.imagesLoaded( function() {
                $container.masonry({
                    itemSelector        : '.masonry-item'
                });
            });
        });
    </script>


    <!-- Bootbox for delete confirmation -->
    <script src="/js/bootbox.min.js"></script>
    <script>
        $(".bootbox-confirm").click(function(e) {
            e.preventDefault();
            var thisForm = this;
            bootbox.confirm("Are you sure? This cannot be undone", function(confirmed) {
                if (confirmed) {
                    thisForm.submit();
                }
            });
        });
    </script>


@endsection