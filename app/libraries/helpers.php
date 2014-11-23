<?php

function filterEmpty($array) {
    return array_where($array, function($key, $value) {
       return $value != '';
    });
}

function intToMoney($int) {
    return number_format( ( $int / 100 ), 2 );
<<<<<<< HEAD
}

function generateReceiptId() {
    $customerId = Auth::id();
    $date = new DateTime();
    return $customerId . $date->getTimestamp();
=======
>>>>>>> d4ea75ad8148036069ecf78156af851b8a387d7a
}