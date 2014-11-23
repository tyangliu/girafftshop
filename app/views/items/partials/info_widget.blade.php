<table class="info-widget">
    <tr>
        <th class="attribute-label">Type</th>
        <td>{{ $item->type }}</td>
        <th class="attribute-label">Company</th>
        <td>{{ $item->company }}</td>
    </tr>
    <tr>
        <th class="attribute-label">Category</th>
        <td>{{ $item->category }}</td>
        <th class="attribute-label">Year</th>
        <td>{{ $item->year }}</td>
    </tr>
    @if(!$item->songs->isEmpty())
    <tr>
        <td colspan=100 class="info-widget-songs">
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