@extends('layouts.app')

@section('content')
    <section class="section">
        <script>
            function showLogin() {
                var loginForm = document.getElementById('login-form');
                var registerForm = document.getElementById('register-form');

                if (!loginForm.hidden) return;

                loginForm.hidden = false;
                registerForm.hidden = true;

                document.getElementById('login-button').classList.add('is-active');
                document.getElementById('register-button').classList.remove('is-active');
            }

            function showRegister() {
                var loginForm = document.getElementById('login-form');
                var registerForm = document.getElementById('register-form');

                if (!registerForm.hidden) return;

                loginForm.hidden = true;
                registerForm.hidden = false;

                document.getElementById('login-button').classList.remove('is-active');
                document.getElementById('register-button').classList.add('is-active');
            }
        </script>
        <div class="container">
            <div class="columns">
                <div class="column is-one-third is-offset-one-fifth">
                    <div class="tabs is-boxed is-fullwidth">
                        <ul>
                            <li id="login-button" class="is-active">
                                <a onclick="showLogin()">Zaloguj się</a>
                            </li>
                            <li id="register-button">
                                <a onclick="showRegister()">Załóz konto</a>
                            </li>
                        </ul>
                    </div>

                    <div id="login-form">
                        @include('auth.login-form', ['from_cart' => true])
                    </div>
                    <div id="register-form" hidden>
                        @include('auth.register-form', ['from_cart' => true])
                    </div>
                </div>
                <div class="column is-one-third">
                    <div class="box">
                        <div class="subtitle">Kup bez rejestracji</div>
                        <div class="content">
                            Nie masz konta i nie chcesz go zakładać? Skorzystaj z opcji zakupów bez rejestracji.
                        </div>
                        <a href="{{ route('payment.contact') }}" class="button is-info is-fullwidth">Kup bez rejestracji</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
