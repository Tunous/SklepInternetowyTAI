@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <h1 class="title">Logowanie</h1>
                        <form action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="field">
                                <div class="control has-icons-left">
                                    <input id="username" type="text" name="username"
                                           class="input{{ $errors->has('username') ? ' is-danger' : '' }}"
                                           placeholder="Login" value="{{ old('username') }}" required autofocus>
                                    <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                </div>
                                @if ($errors->has('username'))
                                    <p class="help is-danger">
                                        {{ $errors->first('username') }}
                                    </p>
                                @endif
                            </div>

                            <div class="field">
                                <div class="control has-icons-left">
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
                                <div class="control">
                                    <label class="checkbox">
                                        <input id="remember" type="checkbox" name="remember"
                                                {{ old('remember') ? 'checked' : '' }}>
                                        Zapamiętaj mnie
                                    </label>
                                </div>
                            </div>

                            <div class="field is-grouped is-grouped-centered">
                                <div class="control">
                                    <input type="submit" class="button is-success" value="Zaloguj">
                                </div>
                            </div>

                            <div class="field">
                                <p class="control has-text-centered">
                                    Nie masz konta?
                                    <a href="{{ route('register') }}">Zarejestruj się</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

