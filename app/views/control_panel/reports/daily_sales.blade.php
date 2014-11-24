@extends('layouts.admin')

@section('title')
<?php $formattedDate = formatDate($date); ?>
Sales Report for {{ $formattedDate }}
@stop

@section('content')
<h1>Sales Report for {{ $formattedDate }}</h1>
@if($groupedRows != [])
    <table class="cp-table">
        <tr>
            <th>UPC</th>
            <th>Category</th>
            <th>Unit Price</th>
            <th>Units</th>
            <th>Total Value</th>
        </tr>
    <?php
        $total = 0;
        $units = 0;
    ?>
    @foreach($groupedRows as $category => $rows)
        <?php
            $groupTotal = 0;
            $groupUnits = 0;
        ?>
        @foreach($rows as $row)
            <tr>
            <?php
                $subtotal = $row->quantity * $row->price;
                $groupTotal += $subtotal;
                $groupUnits += $row->quantity;
            ?>
                <td>{{ $row->item_upc }}</td>
                <td>{{ $row->category }}</td>
                <td>${{ intToMoney($row->price) }}</td>
                <td>{{ $row->quantity  }}</td>
                <td>${{ intToMoney($subtotal) }}</td>

            </tr>
        @endforeach
        <?php
            $total += $groupTotal;
            $units += $groupUnits;
        ?>
        <tr>
            <td></td>
            <th>Total</th>
            <td></td>
            <td class="cp-table-bold">{{ $groupUnits }}</td>
            <td class="cp-table-bold">${{ intToMoney($groupTotal) }}</td>
    @endforeach

        <tr>
            <td colspan="100" class="daily-sales-total">
                <h2>Units Sold: {{ $units }}</h2>
                <h2>Total Revenue: ${{ intToMoney($total) }}</h2>
            </td>
        </tr>
    </table>
@else
    <p class="center">There are no sales on {{ $formattedDate }}.</p>
@endif

@stop