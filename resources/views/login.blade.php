@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <h1 class="title">Logowanie</h1>
                        <form action="/login" method="POST">
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input type="text" class="input" placeholder="Login">
                                    <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control has-icons-left">
                                    <input type="password" class="input" placeholder="Hasło">
                                    <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
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
                                    <a href="/register">Zarejestruj się</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
