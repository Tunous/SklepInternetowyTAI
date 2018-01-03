@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Koszyk</h1>
            @if (count($products) == 0)
                <p class="content">Koszyk jest pusty</p>

                <a href="{{ route('products') }}" class="button">
                    Powrót do listy produktów
                </a>
            @else
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-8">
                        @foreach ($products->chunk(2) as $chunk)
                            <div class="tile is-parent">
                                @foreach ($chunk as $product)
                                    @include('cart.item', ['product' => $product])
                                @endforeach
                            </div>
                        @endforeach

                        <div class="tile is-parent">
                            <div class="tile is-child">
                                <form action="{{ route('cart.empty') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="buttons has-addons is-centered">
                                        <button type="submit" class="button is-danger">
                                            Opróżnij koszyk
                                        </button>

                                        <a href="{{ route('products') }}" class="button">
                                            Przejdź do listy produktów
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tile is-parent">
                        <div class="tile is-child card">
                            <div class="card-content">
                                <div class="level is-mobile">
                                    <div class="level-left">Razem do zapłaty</div>
                                    <div class="level-right has-text-weight-bold">
                                        {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
                                    </div>
                                </div>

                                <hr>

                                <div class="field">
                                    <div class="control">
                                        <a href="{{ route('payment.login') }}"
                                           class="button is-success is-fullwidth">
                                            Przejdź dalej
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
