@extends ('layouts.app')

@push('script')
    <script src="{{asset('js/dashboard.js')}}" defer ></script>
@endpush

@include ('components.header')

@if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/home') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        <h1 style="color:white">Area riservata</h1>        
        @endauth
    </div>
@endif

@foreach ($projects as $project)
    <div>
        {{$project -> title}}
    </div>
@endforeach

<button id="banner-show" onclick="">aggiungi un progetto</button>
<div id="add-proj-dropdown">
    <form action="{{route('store-project')}}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title">
        <input type="text" name="description">
   
        <input type="submit" value="go!">
    </form>
</div>

@include ('components.footer')

