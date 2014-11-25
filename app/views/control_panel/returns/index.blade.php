@extends('layouts.admin')

@section('title')
Returns
@stop

@section('content')
    <h1>Returns</h1>
    @if(!$returns->isEmpty())
    <table class="cp-table">

	    <tr>
            <th>Return ID</th>
            <th>Return Date</th>
            <th>Receipt ID</th>
        </tr>
		@foreach($returns as $return)
            <tr>
            	<td><a href="{{ URL::route('showReturn_path', [$return->returnId]) }}">{{ $return->returnId }}</a></td>
            	<td>{{ formatDate($return->date) }}</td>
            	<td>{{ $return->order_receiptId }}</td>
            </tr>
        @endforeach

    </table>
    @else
        <p class="center">There are no past returns.</p>
    @endif

@stop