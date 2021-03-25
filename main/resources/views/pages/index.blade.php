@extends('layouts.main-layout')

@section('main-section')
    <div class="row">
        @foreach($projects as $project)
        <div class="prj-box col-md-6 p-0 m-0">
            <img style="max-width:100%" src="{{asset('storage/12345678959.jpg')}}" alt="">
            <h2>{{$project -> pictures[0] -> url}}</h2>
        </div>
        @endforeach
    </div>
@endsection

@section('clients-logos')
    <div class="container">
        <div class="row">
            <div class="col-12 text-left m-auto p-4">
                <h5 class="w-100 border-bottom border-white py-5">
                    <strong>some of our best clients.</strong>
                </h5>
            </div>
            @for ($i = 1 ; $i <= 44 ; $i++ ) 
            <div class=" col-12 col-md-4 col-lg-3">
                <img class="m-auto w-100" src="{{asset('storage/clients/logo-' . $i .'.png')}}" alt="">
             </div>
        @endfor 
        </div>  
    </div>
@endsection


