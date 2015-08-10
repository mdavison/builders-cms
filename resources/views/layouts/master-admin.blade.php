<!DOCTYPE Html>
<Html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chestertown Builders | Admin</title>

    <!-- Bootstrap core css -->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css') !!}

    <!-- Html5 shim and Respond.js for IE8 support of Html5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/Html5shiv/3.7.2/Html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- Bootstrap Dashboard Template -->
    {!! Html::style('css/bootstrap-dashboard.css') !!}

    <!-- Other styles -->
    {!! Html::style('css/admin.css') !!}

    @yield('style')


</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Chestertown Builders</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="/admin">Dashboard Home</a></li>
                <li class="dropdown {{ Request::is('photos') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Photos <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/photos">All Photos</a></li>
                        <li><a href="/photos/create">Upload Photo</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ Request::is('galleries') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Galleries <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/galleries">All Galleries</a></li>
                        <li><a href="/galleries/create">Create New Client Gallery</a></li>
                    </ul>
                </li>
                <li class="dropdown {{ Request::is('users') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/users">All Users</a></li>
                        <li><a href="/users/create">Create New User</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ $loggedInUser->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/auth/logout">Log Out</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>



<div class="container">

    @yield('content')



</div><!--/.container-fluid-->



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
{!! Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js') !!}

<!-- My scripts -->
{!! Html::script('/js/script.js') !!}

@yield('script')

</div><!-- /.container -->
</body>
</Html>