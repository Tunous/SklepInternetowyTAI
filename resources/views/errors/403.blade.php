@extends('layouts.app')

@section('content')
    <section class="hero is-large">
        <div class="hero-body">
            <div class="container has-text-centered">
                <h1 class="title has-text-danger">403 - Brak dostępu</h1>
                <h2 class="subtitle">
                    @if (empty($exception->getMessage()))
                        Niestety, ale nie masz uprawnień aby zobaczyć tę stronę.
                    @else
                        {{ $exception->getMessage() }}
                    @endif
                </h2>
                <a href="{{ route('home') }}" class="button is-danger">Powrót na stronę główną</a>
            </div>
        </div>
    </section>
@endsection