<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('Register') }}">Register</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('All_Emp') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('Logout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-link"
                                    style="text-decoration: none; color: black">Logout</button>
                            </form>
                        </li>
                    </ul>
                @endauth

            </div>
        </div>
    </nav>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
