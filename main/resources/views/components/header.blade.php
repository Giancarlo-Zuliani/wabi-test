<header class="container-fluid">
    <div id="navbar" class="m-auto">
        <img src="https://www.wabi.it/img/logo.svg" alt="">
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{'/logout'}}">logout</a>
            @else
            <a href="#">start a project</a>
        @endauth
    </div>
</header>