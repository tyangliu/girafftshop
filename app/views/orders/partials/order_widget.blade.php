<div class="order-widget">
     <a href="/orders/{{ $order->receiptId }}"><h2>Order #{{ $order->receiptId }}</h2></a>
     <p>{{ date("F d\, Y", strtotime($order->date)) }}</p>
</div>