@extends('layouts.app')

@php
    use Illuminate\Support\Facades\Auth;

    $name = old('name') ?: $contact_details['name'];
    $surname = old('surname') ?: $contact_details['surname'];
    $street = old('street') ?: $contact_details['street'];
    $postcode = old('postcode') ?: $contact_details['postcode'];
    $city = old('city') ?: $contact_details['city'];
    $phone = old('phone') ?: $contact_details['phone'];
    $email = old('email') ?: $contact_details['email'];

    if (Auth::check()) {
        $user = Auth::user();
        $name = $user->name ?: $name;
        $surname = $user->surname ?: $surname;
        $street = $user->street ?: $street;
        $postcode = $user->postcode ?: $postcode;
        $city = $user->city ?: $city;
        $phone = $user->phone ?: $phone;
        $email = $user->email ?: $email;
    }
@endphp

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <form action="{{ route('cart-update-contact-details') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Imię i Nazwisko</label>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input id="name" name="name" type="text"
                                                   class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
                                                   placeholder="Imię" value="{{ $name }}" required autofocus>
                                        </div>
                                        @if ($errors->has('name'))
                                            <p class="help is-danger">
                                                {{ $errors->first('name') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input id="surname" name="surname" type="text"
                                                   class="input{{ $errors->has('surname') ? ' is-danger' : '' }}"
                                                   placeholder="Nazwisko" value="{{ $surname }}" required>
                                        </div>
                                        @if ($errors->has('surname'))
                                            <p class="help is-danger">
                                                {{ $errors->first('surname') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Ulica i numer</label>
                            <div class="control">
                                <input id="street" name="street" type="text"
                                       class="input{{ $errors->has('street') ? ' is-danger' : '' }}"
                                       placeholder="Ulica i numer" value="{{ $street }}" required>
                            </div>
                            @if ($errors->has('street'))
                                <p class="help is-danger">
                                    {{ $errors->first('street') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Kod pocztowy i miasto</label>
                            <div class="field is-horizontal">
                                <div class="field-body">
                                    <div class="field">
                                        <div class="control">
                                            <input id="postcode" name="postcode" type="text"
                                                   class="input{{ $errors->has('postcode') ? ' is-danger' : '' }}"
                                                   placeholder="Kod pocztowy" value="{{ $postcode }}" required>
                                        </div>
                                        @if ($errors->has('postcode'))
                                            <p class="help is-danger">
                                                {{ $errors->first('postcode') }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input id="city" name="city" type="text"
                                                   class="input{{ $errors->has('city') ? ' is-danger' : '' }}"
                                                   placeholder="Miasto" value="{{ $city }}" required>
                                        </div>
                                        @if ($errors->has('city'))
                                            <p class="help is-danger">
                                                {{ $errors->first('city') }}
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="field is-expanded">
                            <label class="label">Telefon</label>
                            <div class="field has-addons">
                                <div class="control">
                                    <a class="button is-static">+48</a>
                                </div>
                                <div class="control is-expanded">
                                    <input id="phone" name="phone" type="tel"
                                           class="input{{ $errors->has('phone') ? ' is-danger' : '' }}"
                                           placeholder="Numer telefonu" value="{{ $phone }}" required>
                                </div>
                            </div>
                            @if ($errors->has('phone'))
                                <p class="help is-danger">
                                    {{ $errors->first('phone') }}
                                </p>
                            @endif
                        </div>

                        @guest
                            <div class="field">
                                <label class="label">Email</label>
                                <div class="control">
                                    <input id="email" name="email" type="email"
                                           class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                                           placeholder="Email" value="{{ $email }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <p class="help is-danger">
                                        {{ $errors->first('email') }}
                                    </p>
                                @endif
                            </div>

                            <div class="content">
                                <a href="{{ route('login', ['from_cart' => true]) }}">Zaloguj się</a>
                                lub
                                <a href="{{ route('register', ['from_cart' => true]) }}">zarejestruj</a>
                                aby móc zapamiętać dane.
                            </div>
                        @endguest

                        <div class="field">
                            <div class="control">
                                <button type="submit" class="button is-success">
                                    Kontynuuj
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
