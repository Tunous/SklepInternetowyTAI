@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">{{ $product->name }}</h1>
            @include('product.product', ['product' => $product])
        </div>
    </section>
@endsection
