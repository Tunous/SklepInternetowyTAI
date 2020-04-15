<div class="column">
    <div class="card">
        <div class="card-image">
            <figure class="image">
                <img src="{{ asset("images/products/$product->alias/1.png") }}" alt="Zdjęcie produktu">
            </figure>
        </div>
        <header class="card-header">
            <p class="card-header-title">
                {{ $product->name }}
            </p>
            <form action="{{ route('cart.add', ['product' => $product]) }}" class="card-header-icon" method="post">
                {{ csrf_field() }}
                <button class="button is-white" type="submit">
                    <span class="icon has-text-link"><i class="fa fa-cart-plus"></i></span>
                </button>
            </form>
        </header>
        <div class="card-content">
            <div class="content">
                {{ $product->short_description }}
            </div>
        </div>
        <footer class="card-footer">
            <a href="{{ route('product', ['product' => $product]) }}" class="card-footer-item">Więcej</a>
        </footer>
    </div>
</div>