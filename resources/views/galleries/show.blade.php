@extends('layouts/master')

@section('content')
    <h1 class="page-header">Photo Gallery for {{ $gallery->name }}</h1>


    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
        <div class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div class="modal-body next"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left prev">
                            <i class="glyphicon glyphicon-chevron-left"></i>
                            Previous
                        </button>
                        <button type="button" class="btn btn-primary next">
                            Next
                            <i class="glyphicon glyphicon-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if(count($photos))

        <div class="row">
            @foreach($photos as $photo)
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12">
                    <div class="thumbnail">
                        <a href="/galleryphotos/{{ $photo->filename }}" data-gallery>
                            <img src="/galleryphotos/thumbnails/{{ $photo->filename }}" class="img-responsive" alt="" width="170px">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>There are no photos yet.</p>
    @endif


@stop

@section('style')
    <!-- Bootstrap Image Gallery -->
    <!-- https://github.com/blueimp/Bootstrap-Image-Gallery/blob/master/README.md -->
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="/css/bootstrap-image-gallery.min.css">
@stop

@section('script')
    <!-- Bootstrap Image Gallery -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="/js/bootstrap-image-gallery.min.js"></script>
@stop
