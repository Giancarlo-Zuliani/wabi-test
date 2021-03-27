@extends('layouts.app')

@section('content')
    <form action="{{route('send-mail')}}" method="POST">
        @csrf
        @method('POST')
        <select name="mailObject" id="">
            <option value="">Vorrei conoscervi per parlare di...</option>
            <option value="Collaborazione">Collaborare su un progetto</option>
            <option value="Consulenza">Chiedere una consulenza</option>
            <option value="Altre info">Altro</option>
        </select>
        <input type="text" name="name" placeholder="Nome*">
        <input type="text" name="companyName" placeholder="Nome della tua azienda*">
        <input type="mail" name="mail" placeholder="indirizzo email*">
        <label for="contact">Come ci hai conosciuto?</label>
        <select name="contact" id="">
            <option value="">Scegli*</option>
            <option value="internet">internet</option>
            <option value="social media">vi ho incontrati sui social (Facebook , Instagram ,Linkedin , altro..)</option>
            <option value="mi hanno parlato di voi">mi hanno parlato di voi</option>
            <option value="altro">altro</option>
        </select>
        <input type="text" placeholder="Raccontaci brevemente il tuo progetto">
        <input type="submit" value="contact us">
    </form>
@endsection