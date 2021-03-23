@extends('layouts.main-layout')

@section('main-section')
    <div class="row">
        @foreach($projects as $project)
        <div class="prj-box col-md-6 p-0 m-0"
            style="
            background-image:url('{{asset('storage/' . $project -> pictures[0] -> url)}}'
            )">
            <h2>{{$project -> pictures[0] -> url}}</h2>
        </div>
        @endforeach
    </div>
@endsection
