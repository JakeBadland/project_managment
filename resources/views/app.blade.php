<!DOCTYPE html>
<html>
<head>
    <title>Project Management System</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap.icons.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
                @guest
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/login">{{__('Login')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/registration">{{__('Register')}}</a>
                        </li>
                    </ul>
                @endguest

                @auth
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            {{__('Hello')}}, {{ Auth::user()->name }}
                        </li>
                    </ul>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="/project">{{__('Projects')}}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{__('Language')}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/language/en">English</a></li>
                        <li><a class="dropdown-item" href="/language/ru">Русский</a></li>
                    </ul>
                </li>

                @auth
                    <span class="navbar-link">
                        <a class="nav-link" href="/logout">{{__('Logout')}}</a>
                    </span>
                @endauth
            </div>
        </div>
    </div>
</nav>

@yield('content')
</body>
</html>
