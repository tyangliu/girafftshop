<?php

function filterEmpty($array) {
    return array_where($array, function($key, $value) {
       return $value != '';
    });
}

function intToMoney($int) {
    return number_format( ( $int / 100 ), 2 );
}

function generateReceiptId() {
    $customerId = Auth::id();
    $date = new DateTime();
    return $customerId . $date->getTimestamp();
}