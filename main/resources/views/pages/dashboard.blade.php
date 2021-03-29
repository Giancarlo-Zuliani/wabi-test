@extends ('layouts.app')
{{-- DASHBPOARD SCRIPT --}}
@push('script')
    <script src="{{asset('js/dashboard.js')}}" defer ></script>
@endpush

@section('content')
{{-- HEADER --}}
<div id="dashboard-header" class="text-center my-5 py-5">
    <a href="{{route('index')}}"><img class="vertical" src="https://www.wabi.it/img/logo.svg" alt=""></a>
</div>


<div class="container text-center" id="dashboard-console">
    {{--ERRORS LOGS --}}
    @error('img')
    <div class="my-4">
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span> 
    </div>
    @enderror
    @error('imgDescription')
    <div class="my-4">
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span> 
    </div>
    @enderror
    @error('lastpic')
    <div class="container">
        <div class= "row">
            <div id="dashboard-error-container" class="col-12 text-center">
                    <span class="text-capitalize">{{$message}}</span>
                </div>
            </div>
        </div>
    @enderror
    {{-- ADD PROJECT FORM --}}
    <form class="row text-center w-100 m-auto" action="{{route('create-project')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="col-12 m-auto">
            <input type="text" name="title" placeholder="New project name" required>
            @error('title')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span> 
            @enderror
            <input type="text" name="description" placeholder="New project description" required>
            @error('description')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span> 
            @enderror
        </div>
        <div class="col-12 m-auto">
            <input type="file" name="propic" required>
            @error('propic')
                <span class="invalid-feedback" role="alert">
                <strong class="text-capitalize">{{ $message }}</strong>
                </span> 
            @enderror
            <input type="text" name="imgcaption" placeholder="Image caption" required>
            @error('imgcaption')
                <span class="invalid-feedback" role="alert">
                <strong class="text-capitalize">{{ $message }}</strong>
                </span> 
            @enderror
        </div>
        <div class="col-12 m-auto">    
            <button type="submit">Salva</button>
        </div>
    </form>
</div>
{{-- PROJECT LIST --}}
<div id="dashboard" class="container m-auto pt-5 w-75">
    <div class="row">
        @foreach ($projects as $project)
        <div class="col-12 my-5">
            <h3 class="text-capitalize">{{$project -> title}}</h3>
            <button type="button" class="btn btn-danger dashboard-delete-button">Elimina progetto</button>
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
        {{-- DELETE PROJECT BANNER --}}
        <div class="modal dashboard-delete-project-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">ATTENZIONE!!</h5>
                </div>
                <div class="modal-body">
                  <p>Sei sicuro di voler eliminare il progetto {{$project -> title}}</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger"><a href="{{route('delete-project' ,$project -> id)}}">Elimina progetto</a></button>
                  <button type="button" class="btn btn-secondary dashboard-close-modal-button" data-dismiss="modal">Chiudi</button>
                </div>
              </div>
           </div>
        </div>
        {{-- ADD PICTURE TO PROJECT FORM --}}
        <div class="col-12 text-center">
           <i class="fas fa-plus-square"></i>
            <div class="hidden-picture-form">
                <form action="{{route('update-image' , $project -> id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input name="img" type="file" required>
                    <input name="imgDescription" type="text" placeholder="descrizione immagine" required>
                    <button type="submit">Aggiungi immagine</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection


