<?php

function filterEmpty($array) {
    return array_where($array, function($key, $value) {
       return $value != '';
    });
}

function intToMoney($int) {
    return number_format( ( $int / 100 ), 2 );
}