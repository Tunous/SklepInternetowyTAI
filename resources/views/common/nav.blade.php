@php
    use App\Product;

    $cart = session('cart', []);
    $products = Product::find(array_keys($cart))
@endphp
<nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <div class="navbar-item">
                <span class="icon has-text-primary"><i class="fa fa-birthday-cake"></i></span>
            </div>
            <span class="navbar-burger burger" data-target="nav-menu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <div id="nav-menu" class="navbar-menu">
            <div class="navbar-start">
                <a href="{{ route('home') }}" class="navbar-item is-active">Strona Główna</a>
                <a href="{{ route('products') }}" class="navbar-item">Produkty</a>
            </div>
            <div class="navbar-end">
                @if (count($cart) == 0)
                    <a href="{{ route('cart') }}" class="navbar-item">
                        <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    </a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="{{ route('cart') }}" class="navbar-link">
                            <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                        </a>

                        <div class="navbar-dropdown">
                            @foreach ($products as $product)
                                <a href="{{ route('product', ['product' => $product]) }}" class="navbar-item">
                                    <p>
                                        <span>{{ $product->name }}</span>
                                        <small>(x{{ $cart[$product->id] }})</small>
                                    </p>
                                </a>
                            @endforeach
                            <hr class="navbar-divider">
                            <a href="{{ route('cart') }}" class="navbar-item">Koszyk</a>
                        </div>
                    </div>
                @endif

                @guest
                    <a href="{{ route('login') }}" class="navbar-item">Logowanie</a>
                    <div class="navbar-item">
                        <a href="{{ route('register') }}" class="button is-primary">Rejestracja</a>
                    </div>
                @else
                        <a href="{{ route('payments') }}" class="navbar-item">Historia zamówień</a>
                    <div class="navbar-item">
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="button is-primary">
                                Wyloguj
                            </button>
                        </form>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
