<div class="column is-4">
    <div class="card">
        <div class="card-image">
            <figure class="image is-2by1">
                <img src="https://bulma.io/images/placeholders/640x360.png" alt="Zdjęcie produktu">
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
                {{ $product->description }}
            </div>
        </div>
        <footer class="card-footer">
            <a href="{{ route('product', ['product' => $product]) }}" class="card-footer-item">Więcej</a>
        </footer>
    </div>
</div>