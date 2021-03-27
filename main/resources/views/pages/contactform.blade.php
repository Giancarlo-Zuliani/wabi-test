@extends('layouts.app')
@push('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" ></script>
<script src="{{asset('js/map.js')}}" defer></script>
@endpush
@section('content')

    <div class="container">
        <div class="row my-5">
            <img id="contact-form-header" src="https://www.wabi.it/img/logo.svg" alt="">
        </div>
        <div class="row">
            <div class="col-12">
                <h1 style="font-size:9vw">tell us your story.</h1>
            </div>
            <form id="contactform" action="{{route('send-mail')}}" method="POST">
                @csrf
                @method('POST')
                <div class="row">
                  <div class="col-12">
                     <div class="form-group">
                       <select name="mailObject" id="">
                           <option value="">Vorrei conoscervi per parlare di...</option>
                           <option value="Collaborazione">Collaborare su un progetto</option>
                           <option value="Consulenza">Chiedere una consulenza</option>
                           <option value="Altre info">Altro</option>
                        </select>
                    </div>  
                  </div>  
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Nome*">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                        <input type="text" name="company-name" placeholder="Nome della tua azienda*">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                        <input type="mail" name="mail" placeholder="Indirizzo email*">
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="contact">Come ci hai conosciuto?</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-group">
                        <select name="contact" id="">
                            <option value="">Scegli*</option>
                            <option value="internet">internet</option>
                            <option value="social media">vi ho incontrati sui social (Facebook , Instagram ,Linkedin , altro..)</option>
                            <option value="mi hanno parlato di voi">mi hanno parlato di voi</option>
                            <option value="altro">altro</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                      
                            <input type="textarea" placeholder="Raccontaci brevemente il tuo progetto" rows="1" name="message" id=""></textarea>
        
                      </div>
                  </div>
                  <div id="checkboxes-contactform" class="col-12">
                    <div  class="form-group">
                       <div class="d-flex align-items-baseline">
                           <input type="checkbox" name="privacy" id="">
                           <label for="privacy">(Richiesto) Acconsento al trattamento dei dati personali - informativa</label> 
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="d-flex align-items-baseline">
                            <input type="checkbox" name="marketing" id="">
                            <label for="marketing">(Facoltativo) Acconsento al trattamento dei dati per fini commerciali e di marketing</label> 
                        </div>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="form-button" type="submit" name="submit">Invia</button>
                  </div>
                </div>
            </form>
        </div>
        <div id="contact-form-infos" class="row text-center mb-5">
            <hr>
            <div class="col-md-4 col-12 mb-4">
                <h4 style="color:white;">WABi lab snc</h4>
                <br>
                <h4>P.IVA 04341410266</h4>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <h5>Via del Lavoro , 18</h5>
                <br>
                <h5>31013 Cimavilla di Codognè</h5>
                <br>
                <h5>Treviso - Italy</h5>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <h4>+39 0438 794015</h4>
                <br>
                <h5>info@wabi.it</h5>
            </div>
        </div>
    </div>
    <div class="container-fluid p-0 m-0">
        <div id='map'>

        </div>
    </div>
@endsection