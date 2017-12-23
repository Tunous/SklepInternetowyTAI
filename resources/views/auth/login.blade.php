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
                                    <input id="name" type="text" name="name"
                                           class="input{{ $errors->has('name') ? ' is-danger' : '' }}"
                                           placeholder="Login" value="{{ old('name') }}" required autofocus>
                                    <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                </div>
                                @if ($errors->has('name'))
                                    <p class="help is-danger">
                                        {{ $errors->first('name') }}
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

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-6 col-md-offset-4">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label>--}}
                                            {{--<input type="checkbox"--}}
                                                   {{--name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-8 col-md-offset-4">--}}
                                    {{--<button type="submit" class="btn btn-primary">--}}
                                        {{--Login--}}
                                    {{--</button>--}}

                                    {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                        {{--Forgot Your Password?--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
