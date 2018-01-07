<div class="tile is-child card">
    <div class="card-content">
        <div class="content">
            <div class="level is-mobile">
                <div class="level-left">
                    <div class="level-item">
                        <strong>{{ $product->name }}</strong>
                    </div>
                </div>

                <div class="level-right">
                    <div class="level-item is-size-7">
                        ({{ number_format($product->cost / 100, 2, ',', ' ') }} zł/szt.)
                    </div>
                    <div class="level-item is-size-5 has-text-weight-bold">
                        {{ number_format(($product->cost * $product->quantity) / 100, 2, ',', ' ') }} zł
                    </div>
                </div>
            </div>

            <form action="{{ route('cart.setQuantity', ['product' => $product]) }}" method="POST">
                {{ csrf_field() }}
                <div class="control">
                </div>
                <div class="field has-addons is-expanded">
                    <div class="control is-expanded">
                        <input name="quantity" type="number" class="input" placeholder="Ilość"
                               value="{{ $product->quantity }}" min="1" max="20">
                    </div>
                    <div class="control">
                        <button id="submit" name="action" type="submit" class="button is-success" value="set">
                            <span class="icon"><i class="fa fa-check"></i></span>
                        </button>
                    </div>
                    <div class="control">
                        <button id="remove" name="action" type="submit" class="button is-danger" value="remove">
                            <span class="icon"><i class="fa fa-trash"></i></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>