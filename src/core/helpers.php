<?php

// Generate a series of random characters of specified length
function generateUuid($length=6) {
    // Prepare characters to randomly select from
    $numbers = "1234567890";
    $chars = "abcdefghijklmnopqrstuvwxyz";
    $charSelection = $numbers . $chars . strtoupper($chars);
    $random = "";
    for ($i = 0; $i < $length; $i++) {
        $random .= substr(str_shuffle($charSelection), 0, 1);
    }
    return $random;
}