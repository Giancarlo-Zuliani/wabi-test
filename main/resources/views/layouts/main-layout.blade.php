<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {!! htmlScriptTagJsApi([
        'action' => 'homepage',
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}
</head>
<body>

    @include('components.header')
        <div id="animated-bg" style="background-image: url('{{asset('storage/snow.gif')}}')"></div>
    
    <section class="container-fluid">
        @yield('main-section')
    </section>
    
    <section>
        @yield('clients-logos')
    </section>
    
    @include('components.bottom-jumbotron')

    @include('components.footer')

    @auth
        <div>CULO!</div>
    @endauth

</body>
</html>