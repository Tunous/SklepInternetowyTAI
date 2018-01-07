@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Lista produktów</h1>
            @foreach ($products->chunk(4) as $chunk)
                <div class="columns">
                    @foreach ($chunk as $product)
                        @include('product.product', ['product' => $product])
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endsection
