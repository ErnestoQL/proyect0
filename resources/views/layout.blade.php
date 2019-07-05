<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Law And Order">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        #helpfix{position: fixed; bottom: -4px;right: 10px;}

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-md shadow-sm p-3 rounded mb-4">
    <a class="navbar-brand" href="#">Law And Order</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user_state.index')}}">Users States</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('account.index')}}" >Accounts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('type_account.index')}}">Accounts Types</a>
            </li>
        </ul>
    </div>
</nav>

<main role="main" class="container">
    <div class="jumbotron">
        <h1>@yield('title-content')</h1>
        <p>@yield('content')</p>
    </div>
</main>
<script>
    $('#buttonfix').submit(function(e) {
        e.preventDefault();
        // Coding
        $('#modalfix').modal('hide'); //or  $('#IDModal').modal('hide');
        return false;
    });
</script>
<div id="helpfix">
    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalfix"><i class="fas fa-flag"></i><b>Help</b></button>
</div>
<div class="modal fade" id="modalfix" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Help Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('sendfix')}}" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputPassword1">URL:</label>
                        <input type="url" readonly class="form-control-plaintext" value="{{url()->current()}}" id="url">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Message:</label>
                        <textarea class="form-control" id="message" placeholder="Describe your problem..." rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="buttonfix" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
