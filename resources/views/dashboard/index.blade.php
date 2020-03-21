@extends('layouts.dashboard')

@section('content')
    <h1>Zelf kijken? Open hier de pagina</h1>
    <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ url('/') }}&size=220x220&margin=10" alt="qrcode">

    <h1>Voortgangsmeter</h1>
    <progress max="100" value="50"></progress>
    <meter max="100" value="50"></meter>

    <h1>Voltooide vakken</h1>
    <h2>Periode 1</h2>
    <h3>Blok 1</h3>
    <h3>Blok 2</h3>
    <h3>Blok 3</h3>
    <h3>Blok 4</h3>
@endsection