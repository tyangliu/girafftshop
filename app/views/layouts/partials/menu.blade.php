<div class="menu">
    <ul>
        <li class="menu-item {{ currentPage('cp') }}"><a href="{{ URL::route('dashboard_path') }}">Dashboard</a></li>
        <li class="menu-item {{ currentPage('cp/orders*') }}"><a href="{{ URL::route('cp_orders_path') }}">Pending Orders</a></li>
        <li class="menu-item {{ currentPage('cp/returns*') }}"><a href="{{ URL::route('inventory_path') }}">Return Requests</a></li>
        <li class="menu-item {{ currentPage('cp/inventory*') }}"><a href="{{ URL::route('inventory_path') }}">Inventory</a></li>
        <li class="menu-item {{ currentPage('cp/reports*') }}"><a href="{{ URL::route('inventory_path') }}">Sales Report</a></li>
        <li class="menu-item {{ currentPage('cp/top*') }}"><a href="{{ URL::route('inventory_path') }}">Top-Selling</a></li>
    </ul>
</div>