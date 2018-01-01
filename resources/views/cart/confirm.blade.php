@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
@endphp
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="title">Dane kontaktowe</div>
                    <div class="content">
                        <strong>Imię</strong>: {{ $user->name }}<br>
                        <strong>Nazwisko</strong>: {{ $user->surname }}<br>
                        <strong>Ulica i numer</strong>: {{ $user->street }}<br>
                        <strong>Kod pocztowy</strong>: {{ $user->postcode }}<br>
                        <strong>Miasto</strong>: {{ $user->city }}<br>
                        <strong>Telefon</strong>: {{ $user->phone }}<br>
                        <strong>Email</strong>: {{ $user->email }}
                    </div>
                </div>

                <div class="column">
                    <div class="title">Zawartość koszyka</div>
                    <div class="content">
                        Koszyk jest pusty
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