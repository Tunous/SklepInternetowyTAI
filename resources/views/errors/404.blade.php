@extends('layouts.app')

@section('content')
    <section class="hero is-large">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title has-text-danger">404 - Nie znaleziono</h1>
                <h2 class="subtitle">
                    @if (empty($exception->getMessage()))
                        Niestety nie można znaleźć strony, której szukasz.
                    @else
                        {{ $exception->getMessage() }}
                    @endif
                </h2>
                <a href="/" class="button is-danger">Powrót na stronę główną</a>
            </div>
        </div>
    </section>
@endsection