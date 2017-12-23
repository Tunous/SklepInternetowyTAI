@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <h1 class="title">Rejestracja</h1>
                        <form action="/register" method="POST">
                            {{ csrf_field() }}

                            <div class="field">
                                <label class="label">Dane logowania</label>
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input id="login" type="text" name="login"
                                               class="input{{ $errors->has('login') ? ' is-danger' : '' }}"
                                               placeholder="Login" value="{{ old('login') }}" required autofocus>
                                        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                    </div>
                                    @if ($errors->has('login'))
                                        <p class="help is-danger">
                                            {{ $errors->first('login') }}
                                        </p>
                                    @endif
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input id="password" type="password" name="password"
                                                       class="input{{ $errors->has('password') ? ' is-danger' : '' }}"
                                                       placeholder="Hasło" required>
                                                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                            </div>
                                            @if ($errors->has('password'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('password') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input id="password-confirm" type="password"
                                                       name="password_confirmation"
                                                       class="input{{ $errors->has('password_confirmation') ? ' is-danger' : ''}}"
                                                       placeholder="Powtórz hasło" required>
                                                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                            </div>
                                            @if ($errors->has('password_confirmation'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('password_confirmation') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Dane personalne</label>
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control is-expanded">
                                                <input id="name" type="text" name="name"
                                                       class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
                                                       placeholder="Imię" value="{{ old('name') }}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('name') }}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="field">
                                            <div class="control is-expanded">
                                                <input id="surname" type="text" name="surname"
                                                       class="input{{ $errors->has('surname') ? ' is-danger' : '' }}"
                                                       placeholder="Nazwisko" value="{{ old('surname') }}" required>
                                            </div>
                                            @if ($errors->has('surname'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('surname') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input id="email" type="email" name="email"
                                                       class="input{{ $errors->has('email') ? ' is-danger' : '' }}"
                                                       placeholder="Email" value="{{ old('email') }}" required>
                                                <span class="icon is-small is-left"><i
                                                            class="fa fa-envelope"></i></span>
                                            </div>
                                            @if ($errors->has('email'))
                                                <p class="help is-danger">
                                                    {{ $errors->first('email') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field is-grouped is-grouped-centered">
                                <div class="control is-expanded">
                                    <input type="submit" class="button is-fullwidth is-success" value="Zarejestruj">
                                </div>
                                <div class="control">
                                    <input type="reset" class="button" value="Wyczyść">
                                </div>
                            </div>

                            <div class="field">
                                <p class="control has-text-centered">
                                    Masz już konto?
                                    <a href="{{ route('login') }}">Zaloguj się</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
