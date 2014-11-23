@extends('layouts.admin')

@section('title')
{{ $item->title }}
@stop

@section('content')
    <h1>{{ $item->title }}</h1>
        <table class="cp-table">
            <tr>
                <th>UPC</th>
                <td>{{ $item->upc }}</td>
                <th>Type</th>
                <td>{{ $item->type }}</td>
            </tr>
            <tr>
                <th>Year</th>
                <td>{{ $item->year }}</td>
                <th>Category</th>
                <td>{{ $item->category }}</td>
            </tr>
            <tr>
                <th>Company</th>
                <td>{{ $item->company }}</td>
                <th>Lead Singer</th>

                <td>
                    @if ($item->leadSinger)
                    {{ $item->leadSinger->name }}
                    @else N/A
                    @endif
                </td>
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $item->stock }}</td>
                <th>Price</th>
                <td>{{ $item->present()->price }}</td>
            </tr>
           @if(!$item->songs->isEmpty())
           <tr>
               <td colspan=100 class="inventory-songs">
                   <h2>CD Tracks</h2>
                   <ul>
                       @foreach($item->songs as $song)
                           <li>{{ $song->title }}</li>
                       @endforeach
                   </ul>
               </td>
           </tr>
           @endif
        </table>
    <div class="center">
    {{ Form::open(['route' => ['editItem_path', $item->upc]]) }}
        <dl>
        {{-- Stock Input --}}
            <dt class="form-label">{{ Form::label('stock', 'Quantity to Add') }}</dt>
            <dd>{{ Form::text('stock', null) }}</dd>

        {{-- Price Input --}}
            <dt class="form-label">{{ Form::label('price', 'Price') }}</dt>
            <dd>{{ Form::text('price', null) }}</dd>

        {{-- Submit Button --}}
            <dd class="form-button">{{ Form::submit('Edit Item') }}</dd>
        </dl>
    {{ Form::close() }}
    </div>
@stop
