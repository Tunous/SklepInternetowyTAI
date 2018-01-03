@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            @include('payment.item', ['purchase' => $purchase])
        </div>
    </section>
@endsection
