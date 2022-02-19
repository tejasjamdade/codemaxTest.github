<html>

<head>
    <title>CodeMaxIT</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #9C27B0;
            color: white;
            text-align: center;
        }

        .mt-30{
            margin-top: 30px;
        }
        .mt-25{
            margin-top: 25px;
        }

        .active{
            color: red;
        }

        .mr-20{
            margin-right:20px;
        }

    </style>

</head>
<body>
    <header class="row">
        <nav class="navbar navbar-light bg-faded">
            <a class="navbar-brand" href="/products">CodeMaxIT Solutions Pvt Ltd</a>
            <div id="navbarSupportedContent">
                <a class="mr-20 {{request()->is('products/*') || request()->is('products') ? 'active' : ''}}" href="/products">Products</a>
                <a class="{{request()->is('categories') || request()->is('categories/*') ? 'active' : ''}}" href="/categories">Categories</a>
            </div>
        </nav>
    </header> 
    @section('sidebar')

    @show

    <div class="container">
        @yield('content')
    </div>
</body>

</html>