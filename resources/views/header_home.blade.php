<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="#">
            <img src="{{url('img/kemenag-logo.png')}}" alt="PTSP Sawahlunto" style="width:40px;">
        </a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#web-home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#web-contact">Kontak</a>
                </li> 
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-default btn-sm" href="{{ url('login') }}">
                        <div style="color:black">
                            <i class="fa fa-sign-in"></i> Login
                        </div>
                    </a>
                </li>
            </ul>
        </div> 
    </div>
</nav>