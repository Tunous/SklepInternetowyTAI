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
                    @include('cart.summary', ['products' => $products])
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    <form action="{{ route('payment') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="field is-grouped is-grouped-centered">
                            <div class="control">
                                <a href="{{ route('cart') }}" class="button is-danger">
                                    <span class="icon is-small"><i class="fa fa-arrow-left"></i></span>
                                    <span>Powrót do koszyka</span>
                                </a>
                            </div>

                            <div class="control">
                                <a href="{{ route('payment.contact') }}" class="button">
                                    Popraw dane
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