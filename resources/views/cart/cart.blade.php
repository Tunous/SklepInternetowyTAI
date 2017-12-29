@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Koszyk</h1>
            <div class="columns">
                {{--<div class="column">--}}
                {{--@include('cart.form')--}}
                {{--</div>--}}

                <div class="column">
                    @foreach ($products as $product)
                        @include('cart.item', ['product' => $product])
                    @endforeach
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <div class="box">
                        <p>
                            Do zapłaty:
                            <span id="total-cost">{{ number_format($total_cost / 100, 2, ',', ' ') }}</span>
                            zł brutto
                        </p>
                        <button class="button is-success">Kupuję</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
