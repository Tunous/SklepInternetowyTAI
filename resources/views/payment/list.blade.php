@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Historia zamówień</h1>

            @each('payment.item', $purchases, 'purchase', 'payment.empty')
        </div>
    </section>
@endsection