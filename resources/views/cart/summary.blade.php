<table class="table is-bordered is-striped is-fullwidth">
    <thead>
    <tr>
        <th>Nazwa</th>
        <th>Ilość</th>
        <th>Cena za sztukę</th>
        <th class="has-text-right">Wartość</th>
    </tr>
    </thead>

    <tbody>
    @foreach ($products as $product)
        <tr>
            <td>
                <a href="{{ route('product', ['product' => $product]) }}">
                    {{ $product->name }}
                </a>
            </td>
            <td>{{ $product->quantity }}</td>
            <td>{{ number_format($product->cost / 100, 2, ',', ' ') }} zł</td>
            <td class="has-text-right">
                {{ number_format(($product->cost * $product->quantity) / 100, 2, ',', ' ') }} zł
            </td>
        </tr>
    @endforeach
    </tbody>

    <tfoot>
    <tr>
        <td colspan="2">Razem do zapłaty:</td>
        <td colspan="2" class="has-text-right has-text-weight-bold">
            {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
        </td>
    </tr>
    </tfoot>
</table>
