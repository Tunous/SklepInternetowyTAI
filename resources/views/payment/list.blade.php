@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Historia zamówień</h1>

            @foreach ($purchases as $purchase)
                <div class="box">
                    <div class="title">Zamówienie nr. {{ $loop->iteration }}</div>

                    <div class="columns">
                        <div class="column">
                            <div class="content">
                                <div class="subtitle">Dane kontaktowe</div>
                                <strong>Imię</strong>: {{ $purchase['name'] }}<br>
                                <strong>Nazwisko</strong>: {{ $purchase['surname'] }}<br>
                                <strong>Ulica i numer</strong>: {{ $purchase['street'] }}<br>
                                <strong>Kod pocztowy</strong>: {{ $purchase['postcode'] }}<br>
                                <strong>Miasto</strong>: {{ $purchase['city'] }}<br>
                                <strong>Telefon</strong>: {{ $purchase['phone'] }}<br>
                                <strong>Email</strong>: {{ $purchase['email'] }}
                            </div>
                        </div>

                        <div class="column">
                            <div class="subtitle">Lista produktów</div>

                            <div class="content">
                                <ul>
                                    @foreach ($purchase->products as $product)
                                        <li>
                                            <a href="{{ route('product', ['product' => $product]) }}">
                                                {{ $product->name }}
                                            </a>
                                            <span class="tag">x{{ $product->pivot->quantity }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="column">
                            <div class="subtitle">Szczegóły zamównienia</div>
                            <div class="content">
                                Data zakupu: {{ $purchase->created_at }}<br>
                                Całkowity koszt: {{  number_format($purchase->total_cost / 100, 2, ',', ' ') }} zł
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection