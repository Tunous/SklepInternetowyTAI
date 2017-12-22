@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">{{ $product }}</h1>
            @include('product.product', ['product_id' => $product_id, 'product' => $product])
        </div>
    </section>
@endsection
