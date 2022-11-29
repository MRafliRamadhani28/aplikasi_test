@foreach ($categories as $category)
<tr>
    <td>{{ $category->name }}</td>
    @foreach ($months as $month)
        {{ $total=0; }}
        @foreach ($transactions as $transaction)
            @if (date('Y-m', strtotime($transaction->tanggal)) == $month[0] && $transaction->master->categoryCOA->name == $category->name)
                <?php $total += $transaction->debit + $transaction->credit ?>
            @endif
        @endforeach

        <td>{{ $total }}</td>
    @endforeach
</tr>
@endforeach
@foreach ($kategories as $categori)
<tr>
    <td>{{ $categori->name }}</td>
    @foreach ($months as $month)
        {{ $total=0; }}
        @foreach ($transactions as $transaction)
            @if (date('Y-m', strtotime($transaction->tanggal)) == $month[0] && $transaction->master->categoryCOA->name == $categori->name)
                <?php $total += $transaction->debit + $transaction->credit ?>
            @endif
        @endforeach

        <td>{{ $total }}</td>
    @endforeach
</tr>
@endforeach