<div class="card">
    <div class="card-content">
        <div class="content">
            <h4><strong>{{ $product->name }}</strong></h4>
            {{ number_format($product->cost / 100, 2, ',', ' ') }} zł/szt.

            <form action="{{ route('set-cart-item-quantity', ['product' => $product]) }}" method="POST">
                {{ csrf_field() }}

                <div class="field has-addons">
                    <div class="control">
                        <input name="quantity" type="number" class="input" placeholder="Ilość"
                               value="{{ $product->quantity }}" min="1" max="20">
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-success">
                            <span class="icon"><i class="fa fa-check"></i></span>
                        </button>
                    </div>
                </div>
            </form>

            <form action="{{ route('remove-from-cart', ['product' => $product]) }}" method="POST">
                {{ csrf_field() }}

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-danger">
                            <span class="icon"><i class="fa fa-trash"></i></span>
                            &nbsp;Usuń
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>