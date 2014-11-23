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
    return date("m\/d\/y", strtotime($date));
}

function currentPage($page) {
    return Request::is($page) ? 'current' : '';
}

function generateReceiptId() {
    $customerId = Auth::id();
    $date = new DateTime();
    return $customerId . $date->getTimestamp();
}