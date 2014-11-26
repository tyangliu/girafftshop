@extends('layouts.admin')

@section('title')
Dashboard
@stop

@section('content')
<table class="cp-table dashboard">
<tr>
	<td></td>
	<td>Today</td>
	<td>This Week</td>
	<td>This Month</td>
</tr>
<tr>
	<td>Items Sold</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Revenue</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td>Customers</td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
<h1>Haha funny</h1>

<h2>Top Selling Items Today</h2>
<table class="dashboard-table">
<tr>
	<th>Item</th>
	<th>Company</th>
	<th>Stock</th>
	<th>Units Sold</th>
</tr>
<tr>
	<td>Giraffe</td>
	<td>GirafftCart</td>
	<td>5</td>
	<td>3</td>
</tr>
<tr>
	<td>Giraffe</td>
	<td>GirafftCart</td>
	<td>5</td>
	<td>3</td>
</tr>
</table>

<h2>Latest Item Sales</h2>
<table class="dashboard-table">
<tr>
	<th>Item</th>
	<th>Company</th>
	<th>Stock</th>
	<th>Units Sold</th>
</tr>
<tr>
	<td>Giraffe</td>
	<td>GirafftCart</td>
	<td>5</td>
	<td>3</td>
</tr>
<tr>
	<td>Giraffe</td>
	<td>GirafftCart</td>
	<td>5</td>
	<td>3</td>
</tr>
</table>
@stop