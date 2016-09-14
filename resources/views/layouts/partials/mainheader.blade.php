<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Mailer</b> </span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Tasks Menu -->
                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">Регистрация</a></li>
                    <li><a href="{{ url('/login') }}">Войти</a></li>
                @else

                    <a href="{{ url('/logout') }}"
                       class="btn btn-default btn-flat logout">Выйти</a>
                @endif

            </ul>
        </div>
    </nav>
</header>
