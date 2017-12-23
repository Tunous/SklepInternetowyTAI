@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <h1 class="title">Lista produktów</h1>
            @foreach ($products as $product)
                @if ($loop->index % $num_columns == 0)
                    <div class="columns">
                        @endif
                        @include('product.product', ['product' => $product])
                        @if ($loop->index % $num_columns == $num_columns - 1 || $loop->last)
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
