<div class="order-widget">
     <a href="/orders/{{ $order->receiptId }}"><h2>Order #{{ $order->receiptId }}</h2></a>
     <ul class="item-widget-attributes">
         <li><span class="attribute-label">Order Date: </span>{{ formatDate($order->date) }}</li>
         <li><span class="attribute-label">Status: </span>
            @if($order->deliveredDate != null)
                delivered on {{ formatDate($order->deliveredDate) }}
            @else
                estimated delivery on {{ formatDate($order->expectedDate) }}
            @endif
         </li>
     </ul>
</div>