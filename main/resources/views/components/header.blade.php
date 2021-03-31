{{-- INDEX HEADER --}}
<header class="container-fluid">
    <div id="navbar" class="m-auto h-25">
        <a href="{{route('index')}}"><img src="https://www.wabi.it/img/logo.svg" alt=""></a>
        @auth
            <a href="{{ url('/dashboard') }}">Dashboard</a>
            <a href="{{'/logout'}}">logout</a>
            @else
            <a href="{{route('contact-form')}}">start a project</a>
        @endauth
    </div>
</header>