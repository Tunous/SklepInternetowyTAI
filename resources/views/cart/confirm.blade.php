@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="title">Dane kontaktowe</div>
                    <div class="content">
                        <strong>Imię</strong>: {{ $contact_details['name'] }}<br>
                        <strong>Nazwisko</strong>: {{ $contact_details['surname'] }}<br>
                        <strong>Ulica i numer</strong>: {{ $contact_details['street'] }}<br>
                        <strong>Kod pocztowy</strong>: {{ $contact_details['postcode'] }}<br>
                        <strong>Miasto</strong>: {{ $contact_details['city'] }}<br>
                        <strong>Telefon</strong>: {{ $contact_details['phone'] }}<br>
                        <strong>Email</strong>: {{ $contact_details['email'] }}
                    </div>
                </div>

                <div class="column">
                    <div class="title">Zawartość koszyka</div>
                    <div class="content">
                        <ul>
                            @foreach ($products as $product)
                                <li>
                                    {{ $product->name }} x{{ $product->quantity }} ({{ $product->cost }})
                                </li>
                            @endforeach
                        </ul>

                        <hr>

                        @include('cart.cost-summary')
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <form action="{{ route('cart-buy') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="field is-grouped is-grouped-centered">
                            <div class="control">
                                <a href="{{ route('cart-show-contact-form') }}" class="button">
                                    <span class="icon is-small"><i class="fa fa-arrow-left"></i></span>
                                    <span>Popraw dane</span>
                                </a>
                            </div>

                            <div class="control">
                                <button type="submit" class="button is-success">
                                    <span class="icon is-small"><i class="fa fa-check"></i></span>
                                    <span>Kupuję</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection