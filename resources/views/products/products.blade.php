@extends('layouts.app')

@php
    $products = ['Piernik', 'Szarlotka', 'Cytrynowiec'];
    $num_products = count($products);
    $num_columns = 3;
@endphp

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Lista produktów</h1>
            @foreach ($products as $index => $product)
                @if ($index % $num_columns == 0)
                    <div class="columns">
                        @endif
                        @include('products.product', ['product_id' => $index, 'product' => $product])
                        @if ($index % $num_columns == $num_columns - 1 || $index == $num_products - 1)
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
