<?php

function filterEmpty($array) {
    return array_where($array, function($key, $value) {
       return $value != '';
    });
}