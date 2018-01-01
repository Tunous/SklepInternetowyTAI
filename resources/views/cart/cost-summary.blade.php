<table class="table is-fullwidth">
    <tbody>
    <tr>
        <td class="has-text-grey-light">Wartość:</td>
        <td id="total-cost" class="has-text-right">
            {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
        </td>
    </tr>
    <tr>
        <td class="has-text-grey-light">Koszt dostawy:</td>
        <td class="has-text-right">0,00 zł</td>
    </tr>
    <tr>
        <td>Razem do zapłaty</td>
        <td class="has-text-right has-text-weight-bold">
            {{ number_format($total_cost / 100, 2, ',', ' ') }} zł
        </td>
    </tr>
    </tbody>
</table>