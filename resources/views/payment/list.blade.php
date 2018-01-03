@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Historia zamówień</h1>

            @forelse ($purchases as $purchase)
                @include('payment.item', ['purchase' => $purchase])
            @empty
                <p>Brak zamówień</p>
            @endforelse
        </div>
    </section>
@endsection