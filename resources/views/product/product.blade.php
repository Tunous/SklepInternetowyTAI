<div class="column is-4">
    <div class="card">
        <div class="card-image">
            <figure class="image is-2by1">
                <img src="https://bulma.io/images/placeholders/640x360.png" alt="Zdjęcie ciasta">
            </figure>
        </div>
        <header class="card-header">
            <p class="card-header-title">
                {{ $product }}
            </p>
            <form action="" class="card-header-icon" method="post">
                <button class="button is-white" type="submit" name="do-koszyka" value="{{ $product_id }}">
                    <span class="icon has-text-link"><i class="fa fa-cart-plus"></i></span>
                </button>
            </form>
        </header>
        <div class="card-content">
            <div class="content">
                Opis produktu
            </div>
        </div>
        <footer class="card-footer">
            <a href="/produkt/{{ $product_id }}" class="card-footer-item">Więcej</a>
        </footer>
    </div>
</div>