<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Myslivci jsou nejlepší</title>
    <link href="/img/logo.png" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- BOOTSTRAP CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <!-- FONTAWESOME ICONS -->
    <script src="https://kit.fontawesome.com/dd93db7e23.js" crossorigin="anonymous"></script>
    <!-- MISC SCRIPTS AND CSS -->
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <link href="/css/main.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#138E29">
        <div>
            <a href="/">
                <img src="/img/logo.png" width="100px" height="100px">
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item"><a class="nav-link" href="/">Články</a></li>
                <li class="nav-item"><a class="nav-link" href="/posts">Diskuzie</a></li>
                <li class="nav-item"><a class="nav-link" href="/chat">Live chat</a></li>
                <li class="nav-item"><a class="nav-link" href="/stream">Livestream</a></li>
                <li class="nav-item"><a class="nav-link" href="/gallery">Galéria</a></li>
                @guest
                    <li class="nav-item"><a class="nav-link" href="/register">Registrácia</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endguest
                @auth
                    <li class="nav-item"><a class="nav-link" href="/account">Profil</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odhlášení</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container main" id="content">
        @yield('content')
    </div>

    <footer class="fixed-bottom" id="ftr">
        <script>
            var footerHiddenVer = Cookies.get('footerHidden');

            function hideId(input) {
                document.getElementById(input).style.display = "none";
                var setCookie = Cookies.set('footerHidden', 'yes');

                return setCookie;
            }
            if (footerHiddenVer == 'yes') {
                document.getElementById('ftr').style.display = "none";
            }

        </script>
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <script>
                    if (footerHiddenVer == 'yes') {
                        document.getElementById('ftr').style.display = "none";
                    }

                </script>
                <p class="footerText">&copy; Helou Yes <br>
                    Webová prezentace vytvorená pre predmet A5RPA
                </p>
            </div>
            <div class="col-md-3" align="right">
                <button class="btn btn-light btn-sm pull-right footerBtn" type="button"
                    onClick="hideId('ftr')">Skryť</button>
            </div>
        </div>
    </footer>

</body>

</html>
