@extends('layouts.app')

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var images = Array.prototype.slice.call(document.getElementsByClassName('preview-image'), 0);
            var bigImage = document.getElementById('big-image');
            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    bigImage.src = image.src;
                })
            })
        });
    </script>
    <section class="section">
        <div class="container">
            <div class="title">{{ $product->name }}</div>
            <div class="subtitle">{{ $product->short_description }}</div>

            <div class="columns">
                <div class="column is-4">
                    <figure class="image">
                        <img id="big-image" src="{{ asset("storage/products/$product->alias/1.jpg") }}"
                             style="max-height: 500px;"
                             alt="Zdjęcie produktu">
                    </figure>
                </div>

                <div class="column">
                    @php
                        use Illuminate\Support\Facades\Storage;

                        $files = collect(Storage::files("public/products/$product->alias"));
                    @endphp
                    @foreach ($files->chunk(3) as $chunk)
                        <div class="level is-mobile">
                            @foreach ($chunk as $file)
                                <a class="level-item">
                                    <img src="{{ asset("storage/products/$product->alias/" . collect(explode('/', $file))->last()) }}"
                                         class="preview-image"
                                         style="height: 80px">
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                    <ul>
                    </ul>
                </div>

                <div class="column is-4">
                    <table class="table is-fullwidth">
                        <tr>
                            <td>Cena:</td>
                            <th class="is-size-2 has-text-right">{{ number_format($product->cost / 100, 2, ',', ' ') }}
                                zł
                            </th>
                        </tr>
                        <tr>
                            <td>Ilość:</td>
                            <td class="has-text-right">
                                <form action="{{ route('cart.add', ['product' => $product]) }}" method="POST">
                                    {{ csrf_field() }}

                                    <div class="field">
                                        <div class="control">
                                            <input type="number" class="input" name="quantity"
                                                   min="1" max="20" value="{{ old('quantity', 1) }}" title="Ilość">
                                        </div>
                                    </div>

                                    <div class="field">
                                        <div class="control">
                                            <button type="submit" class="button is-success">
                                                <span class="icon"><i class="fa fa-cart-plus"></i></span>
                                                <span>Dodaj do koszyka</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="content">
                {!! $product->description !!}
            </div>
        </div>
    </section>
@endsection
