<?php

function filterEmpty($array) {
    return array_where($array, function($key, $value) {
       return $value != '';
    });
}

function intToMoney($int) {
    return number_format( ( $int / 100 ), 2 );
}

function formatDate($date) {
    return date("m/d/y", strtotime($date));
}

function currentPage($page) {
    return Request::is($page) ? 'current' : '';
}

function generateReceiptId() {
    $customerId = Auth::id();
    $date = new DateTime();
    return $customerId . $date->getTimestamp();
}

function generateReturnId() {
    $customerId = Auth::id();
    $date = new DateTime();
    return $customerId . $date->getTimestamp();
}

function isReturnable($order) {
    $seconds = strtotime(date('Y-m-d')) - strtotime($order->date);
    $days = ceil($seconds / 86400);
    return $days <= 15;
}

function getSum($receiptId, $item_upc)
{
    $result = DB::select(DB::raw(
        "SELECT SUM(quantity) as qtySum FROM return_items ri, returns r
             WHERE ri.return_returnId = r.returnId
             AND r.order_receiptId = '" . $receiptId .
        "'AND item_upc =" . $item_upc .
        " GROUP BY item_upc"));

    if (empty($result)) {
        $sum = 0;
    }
    else {
        $sum = $result[0]->qtySum;
    }
    return $sum;
}
