@extends ('layouts.app')

@push('script')
    <script src="{{asset('js/dashboard.js')}}" defer ></script>
@endpush

@section('content')
<div id="dashboard-header" class="text-center my-5">
    <img src="https://www.wabi.it/img/logo.svg" alt="">
</div>
<div>
    <form action="{{route('create-project')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <input type="text" name="title" placeholder="new project name">
        <input type="text" name="description" placeholder="new project description">
        <input type="file" name="propic">
        <input type="text" name="imgcaption" placeholder="image caption">
        <input type="submit" value="salva nuovo progetto">
    </form>
</div>
<div id="dashboard" class="container m-auto pt-5 w-75">
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-12 my-5">
            <h3>{{$project -> title}}</h3>
            <hr>
            @foreach ( $project -> pictures  as $pic)
            <div class="image-container">
                <img class="dashboard-images" src="{{asset('storage/projects-resources/' . $pic -> url)}}" alt="{{$pic -> description}}">
                <a href="{{route('delete-image', $pic -> id)}}">
                    <i class="fas fa-trash"></i>    
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-12 text-center">
            <a href="#"><i class="fas fa-plus-square"></i></a>
            <form action="{{route('update-image' , $project -> id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input name="img" type="file">
                <input name="description" type="text">
                <input type="submit" value="salva">
            </form>
        </div>
        @endforeach
    </div>
</div>

<div id="add-proj-dropdown">
    <form action="{{route('store-project')}}" method="POST">
        @csrf
        @method('POST')
        <input type="text" name="title">
        <input type="text" name="description">
        <input type="submit" value="go!">
    </form>
</div>
@endsection


