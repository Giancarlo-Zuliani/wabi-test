@extends('layouts.main-layout')
@push('script')
<script src="{{asset('js/carousel.js')}}" defer ></script>

@section('main-section')
    <div class="row">
        @foreach($projects as $project)
        {{-- PROJECTS BOXES --}}
        <div class="prj-box col-md-6 p-0 m-0">
            <img src="{{asset('storage/projects-resources/' . $project -> pictures[0] -> url)}}" alt="">
            <h2 class="text-capitalize">{{$project -> title}}</h2>
        </div>
        {{-- CAROUSELS MODALS --}}
        <div class="modal" id="modal_wait" tabindex="-1" role="dialog" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body d-flex justify-content-center align-items-center">
                        <div class="container">
                        <div id="carouselExampleControls{{$loop -> index}}" class=" carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="close" ></div>
                                {{-- CAROUSEL ITEMS --}}
                                @foreach( $project -> pictures as $pic )
                                <div class="carousel-item {{$loop -> index == 0 ? 'active' : '' }} ">
                                    <img class="d-block w-100" src="{{asset('storage/projects-resources/' . $pic -> url)}}" alt="{{$pic -> description}}">
                                    {{-- CAROUSEL CAPTIONS --}}
                                    <div class="carousel-caption d-none d-md-block carousel-description">
                                        <h5 class="text-capitalize">{{$project -> title}}</h5>
                                        <p class="text-capitalize">{{$pic -> description}}</p>
                                      </div>
                                </div>
                                @endforeach
                                {{-- CAROUSEL CONROLLERS --}}
                            </div>
                               <a class="carousel-control-prev" href="#carouselExampleControls{{$loop -> index}}" role="button" data-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>
                             </a>
                              <a class="carousel-control-next" href="#carouselExampleControls{{$loop -> index}}" role="button" data-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Next</span>
                             </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

{{-- CLIENTS SVGS --}}
@section('clients-logos')
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12 text-left m-auto p-4">
                <h5 id="clients-title" class="w-100 border-bottom border-white py-5">
                    <strong class="text-capitalize">some of our best clients.</strong>
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


