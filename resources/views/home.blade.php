@extends('layouts.app')

@section('header')
    <section class="hero is-primary is-medium"
             style="background-image: url('{{ asset('image/back-main.jpg') }}')">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-size-1">Sklep internetowy</h1>
                <strong class="subtitle">Projekt zaliczeniowy z Tworzenia Aplikacji Internetowych</strong>
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
                <p class="content">
                    Witaj <strong class="has-text-primary">{{ Auth::user()->username }}</strong> na Stronie Głównej!<br>
                    Jesteś zalogowany.<br>
                    <br>
                    @php ($purchases = Auth::user()->purchases)
                    @if (count($purchases) == 0)
                        Brak zamówień.
                    @else
                        <a href="{{ route('payment.show', ['purchase' => $purchases->last()]) }}" class="">
                            Zobacz ostatnie zamówienie.
                        </a>
                    @endif
                </p>
            @endguest
        </div>
    </section>
@endsection
