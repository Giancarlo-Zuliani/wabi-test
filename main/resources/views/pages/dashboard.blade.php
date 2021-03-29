@extends ('layouts.app')

@push('script')
    <script src="{{asset('js/dashboard.js')}}" defer ></script>
@endpush

@section('content')
<div id="dashboard-header" class="text-center my-5 py-5">
    <img class="vertical" src="https://www.wabi.it/img/logo.svg" alt="">
</div>
<div class="container">
    <div class="row">
        @if($errors)
        <h4>{{$errors -> first()}}</h4>
        @endif
    </div>
</div>
<div class="container text-center" id="dashboard-console">
        <form class="row text-center w-100 m-auto" action="{{route('create-project')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="col-12 m-auto">
                <input type="text" name="title" placeholder="new project name" required>
                <input type="text" name="description" placeholder="new project description" required>
            </div>
            <div class="col-12 m-auto">
                <input type="file" name="propic" required>
                <input type="text" name="imgcaption" placeholder="image caption" required>
            </div>
            <div class="col-12 m-auto">    
                <button type="submit">Salva</button>
            </div>
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
           <i class="fas fa-plus-square"></i>
            <div class="hidden-picture-form">
                <form action="{{route('update-image' , $project -> id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input name="img" type="file" required>
                    <input name="description" type="text" value="descrizione immagine" required>
                    <button type="submit">Aggiungi immagine</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


