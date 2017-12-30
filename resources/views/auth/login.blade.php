@extends('layouts.app')

@section('content')
    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns">
                    <div class="column is-one-third is-offset-one-third">
                        <h1 class="title">Logowanie</h1>
                        @include('auth.login-form', ['from_cart' => false])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

