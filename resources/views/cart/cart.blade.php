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
                                <form action="{{ route('empty-cart') }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="buttons has-addons is-centered">
                                        <button type="submit" class="button is-danger">
                                            Opróżnij koszyk
                                        </button>

                                        <a href="{{ route('products') }}" class="button">
                                            Powrót do listy produktów
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tile is-parent">
                        <div class="tile is-child card">
                            <div class="card-content">
                                <table class="table is-fullwidth">
                                    <tbody>
                                    <tr>
                                        <td class="has-text-grey-light">Wartość:</td>
                                        <td id="total-cost" class="has-text-right">
                                            {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="has-text-grey-light">Koszt dostawy:</td>
                                        <td class="has-text-right">0,00 zł</td>
                                    </tr>
                                    <tr>
                                        <td>Razem do zapłaty</td>
                                        <td class="has-text-right has-text-danger has-text-weight-bold">
                                            {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <hr>

                                <div class="field">
                                    <div class="control">
                                        <a href="{{ route('cart-show-login-form') }}"
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
