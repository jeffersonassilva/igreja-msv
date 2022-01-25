@extends('layouts.default')

@section('content')
    <div class="text">
        <h2>Uma igreja para<br><span>abençoar</span> a sua família.</h2>
        <p>Somos uma igreja que tem o propósito de ser benção para sua família,
            localizada no bairro Jardins Mangueiral - DF. Temos cultos semanais, escola bíblica dominical,
            salas individuais para nossas crianças, e mais.. Venha nos visitar!!
        </p>
        {{-- <a href="#" class="btn">Quero fazer parte</a>--}}
    </div>
    <div class="grid">
        <div class="slider">
            <div class="slides active">
                <img src="{{ asset('/img/instagram/1.jpg') }}" alt="">
            </div>
            <div class="slides">
                <img src="{{ asset('/img/instagram/2.jpg') }}" alt="">
            </div>
            <div class="slides">
                <img src="{{ asset('/img/instagram/3.jpg') }}" alt="">
            </div>
        </div>
        <div class="prevNext">
            <span class="prev"><ion-icon name="chevron-back-outline"></ion-icon></span>
            <span class="next"><ion-icon name="chevron-forward-outline"></ion-icon></span>
        </div>
    </div>
@endsection
