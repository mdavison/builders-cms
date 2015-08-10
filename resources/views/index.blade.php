@extends('layouts/master')

@section('content')

    @if ($photos->count())
        <!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <?php $counter = 0; ?>
            <ol class="carousel-indicators">
                @foreach ($photos as $photo)
                    <li data-target="#myCarousel" data-slide-to="{{ $counter }}" class="{{ $counter==0 ? 'active' : '' }}"></li>
                    <?php $counter++; ?>
                @endforeach
            </ol>

          <div class="carousel-inner" role="listbox">
              <?php $counter = 0; ?>
              @foreach ($photos as $photo)
                  <div class="item {{ $counter==0 ? 'active' : '' }}">
                      <img src="/galleryphotos/carousel/{{$photo->filename}}" alt="{{$photo->filename}}">
                  </div>
                  <?php $counter++; ?>
              @endforeach
          </div>

          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- /.carousel -->
    @endif

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">




      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Welcome to Chestertown Builders</h2>
          <p class="lead">
              There is a difference between a custom home and a Chestertown Builders, Inc. custom home. We are a personal
              building company that features top quality construction and hands-on service with the goal of providing our
              customers with a pleasant building experience. The employees and contractors affiliated with Chestertown
              Builders, Inc. all share the same passion for honest business practices and a superior finished product.
          </p>
        </div>
        <div class="col-md-5">
          <!-- <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image"> -->
            <img class="featurette-image img-responsive" src="http://www.chestertownbuilders.com/photos/DSC00388.JPG">
        </div>
      </div>

        <!--
              <hr class="featurette-divider">

                <!--
              <div class="row featurette">
                <div class="col-md-5">
                  <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                </div>
                <div class="col-md-7">
                  <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
                  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
              </div>

              <hr class="featurette-divider">

              <div class="row featurette">
                <div class="col-md-7">
                  <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                  <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
                </div>
                <div class="col-md-5">
                  <img class="featurette-image img-responsive" data-src="holder.js/500x500/auto" alt="Generic placeholder image">
                </div>
              </div>

              <hr class="featurette-divider">
                -->

      <!-- /END THE FEATURETTES -->
    </div>

@stop