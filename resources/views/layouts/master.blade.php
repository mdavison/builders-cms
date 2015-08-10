<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>Chestertown Builders, Inc.</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->
    <link href="/css/carousel.css" rel="stylesheet">

    <!-- Other Styles -->
    <link href="/css/style.css" rel="stylesheet">
    @yield('style')


</head>
<!-- NAVBAR
================================================== -->
<body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><img src="http://www.chestertownbuilders.com/images/logo.png" alt="Chestertown Builders, Inc." ></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="{!! Request::is('/') ? 'active' : '' !!}"><a href="/">Home {!! Request::is('/') ? '<span class="sr-only">(current)</span>' : '' !!}</a></li>
                    <li class="{!! Request::is('gallery') ? 'active' : '' !!}"><a href="/gallery">Gallery {!! Request::is('gallery') ? '<span class="sr-only">(current)</span>' : '' !!}</a></li>
                    <li class="{!! Request::is('about') ? 'active' : '' !!}"><a href="/about">About {!! Request::is('about') ? '<span class="sr-only">(current)</span>' : '' !!}</a></li>
                    <li class="{!! Request::is('contact') ? 'active' : '' !!}"><a href="/contact">Contact {!! Request::is('contact') ? '<span class="sr-only">(current)</span>' : '' !!}</a></li>
                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <div class="container">

        @yield('content')


        <!-- FOOTER -->
        <hr class="featurette-divider">
        <footer>
            <p class="pull-right"><a href="#">Back to top</a></p>
            <p>&copy; 2015 Chestertown Builders, Inc.</p>
        </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>

    @yield('script')

</body>
</html>
