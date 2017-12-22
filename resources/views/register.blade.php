@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <h1 class="title">Rejestracja</h1>
                        <form action="/register" method="POST">
                            <div class="field">
                                <label class="label">Dane logowania</label>
                                <div class="field">
                                    <div class="control has-icons-left">
                                        <input type="text" class="input" placeholder="Login">
                                        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input type="password" class="input" placeholder="Hasło">
                                                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input type="password" class="input" placeholder="Powtórz hasło">
                                                <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="field">
                                <label class="label">Dane personalne</label>
                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <p class="control is-expanded">
                                                <input type="text" class="input" placeholder="Imię">
                                            </p>
                                        </div>
                                        <div class="field">
                                            <p class="control is-expanded">
                                                <input type="text" class="input" placeholder="Nazwisko">
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="field is-horizontal">
                                    <div class="field-body">
                                        <div class="field">
                                            <div class="control is-expanded has-icons-left">
                                                <input type="email" class="input" placeholder="Email">
                                                <span class="icon is-small is-left"><i
                                                            class="fa fa-envelope"></i></span>
                                            </div>
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
                                    <a href="/login">Zaloguj się</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
