<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    {!! htmlScriptTagJsApi([
        'action' => 'homepage',
    ]) !!}
</head>
<body>

    @include('components.header')
        <div id="animated-bg" style="background-image: url('{{asset('storage/snow.gif')}}')"></div>
    
    @include('components.upper-jumbotron')
    
    <section class="container-fluid">
        @yield('main-section')
    </section>
    
    
    @include('components.bottom-jumbotron')
    
    <section>
        @yield('clients-logos')
    </section>
    
    @include('components.footer')

</body>
</html>