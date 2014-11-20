<h1>Customers</h1>
@foreach ($customers as $customer)
    <ul>
        <li><b>Username:</b> {{ $customer->username }}</li>
        <li><b>Password(hashed):</b> {{ $customer->password }}</li>
        <li><b>Name:</b> {{ $customer->name }}</li>
        <li><b>Address:</b> {{ $customer->address }}</li>
        <li><b>Phone:</b> {{ $customer->phone }}</li>
    </ul>
@endforeach

<h1>Items</h1>
@foreach ($items as $item)
    <ul>
        <li><b>UPC:</b> {{ $item->upc }}</li>
        <li><b>Title:</b> {{ $item->title }}</li>
        <li><b>Type:</b> {{ $item->type }}</li>
        <li><b>Category:</b> {{ $item->category }}</li>
        <li><b>Company:</b> {{ $item->company }}</li>
        <li><b>Year:</b> {{ $item->year }}</li>
        <li><b>Price:</b> {{ $item->price }}</li>
        <li><b>Stock:</b> {{ $item->stock }}</li>
        <li><b>LeadSinger:</b> {{ json_encode($item->leadSinger) }}</li>
    </ul>
@endforeach

<h1>Orders</h1>
<ul>
@foreach ($orders as $order)
    <li>{{ json_encode($order) }}</li>
@endforeach
</ul>

<h1>Routes</h1>

<ul>
<li><a href="{{ URL::route('home') }}">Home (guest: sign in |customer: item search)</a></li>
<li><a href="{{ URL::route('signup_path') }}">Sign Up</a></li>
<li><a href="{{ URL::route('newItem_path') }}">Add New Item</a></li>
<li><a href="{{ URL::route('editItem_path') }}">Edit Item</a></li>
</ul>


