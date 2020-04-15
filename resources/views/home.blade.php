@extends('layouts.app')

@section('header')
<section class="hero is-primary" style="background-image: url('{{ asset('images/back-main.jpg') }}')">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <h1 class="title is-size-1">Sklep planszowy</h1>
                    <strong class="subtitle">Projekt z PiTGE</strong>
                </div>
                <div class="column is-4">
                    @include('product.product', ['product' => $product])
                </div>
            </div>
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