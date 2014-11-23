<div class="menu">
    <ul>
        <li class="menu-item {{ currentPage('dashboard*') }}"><a href="{{ URL::route('dashboard_path') }}">Dashboard</a></li>
        <li class="menu-item {{ currentPage('refunds*') }}"><a href="{{ URL::route('inventory_path') }}">Refund Requests</a></li>
        <li class="menu-item {{ currentPage('inventory*') }}"><a href="{{ URL::route('inventory_path') }}">Inventory</a></li>
        <li class="menu-item {{ currentPage('reports*') }}"><a href="{{ URL::route('inventory_path') }}">Sales Report</a></li>
        <li class="menu-item {{ currentPage('top*') }}"><a href="{{ URL::route('inventory_path') }}">Top-Selling</a></li>
    </ul>
</div>