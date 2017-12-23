@extends('layouts.app')

@section('header')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title">Sklep z ciastami</p>
                <p class="subtitle">Projekt zaliczeniowy z Tworzenia Aplikacji Internetowych</p>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="section">
        <div class="container">
            @guest
                Witaj na Stronie Głównej!
            @else
                Witaj <strong>{{ Auth::user()->name }}</strong> na Stronie Głównej! <br>
                <br>
                Jesteś zalogowany.
            @endguest
        </div>
    </section>
@endsection
