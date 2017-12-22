@php
    $bucket_items = [];
    //$bucket_items = ["Szarlotka" => 2];
    $num_bucket_items = count($bucket_items);
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
                <a href="/" class="navbar-item is-active">Strona Główna</a>
                <a href="/produkty" class="navbar-item">Produkty</a>
            </div>
            <div class="navbar-end">
                @if ($num_bucket_items == 0)
                    <a href="/koszyk" class="navbar-item">
                        <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                    </a>
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="/koszyk" class="navbar-link">
                            <span class="icon"><i class="fa fa-shopping-cart"></i></span>
                        </a>

                        <div class="navbar-dropdown">
                            @foreach ($bucket_items as $name => $count)
                                <div class="navbar-item">{{ $name }} x{{ $count }}</div>
                            @endforeach
                            <hr class="navbar-divider">
                            <a href="/koszyk" class="navbar-item">Koszyk</a>
                        </div>
                    </div>
                @endif

                <a href="/login" class="navbar-item">Logowanie</a>
                <div class="navbar-item">
                    <a href="/register" class="button is-primary">Rejestracja</a>
                </div>
            </div>
        </div>
    </div>
</nav>
