<?php

// Generate a series of random characters of specified length
function generateUuid($length=6) {

    // Prepare characters to randomly select from
    $numbers = "1234567890";
    $chars = "abcdefghijklmnopqrstuvwxyz";

    // Add numbers, lower- and uppercase characters
    $charSelection = $numbers . $chars . strtoupper($chars);
    $random = "";
    for ($i = 0; $i < $length; $i++) {
        // Add a random character
        $random .= substr(str_shuffle($charSelection), 0, 1);
    }
    return $random;
}



// Use google charts API to generate QR Codes
// https://developers.google.com/chart/infographics/docs/qr_codes
function generateQrcode($data) {
    $size = "500x500";
    $qrcode = ('https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs='.$size.'&chl='.urlencode($data));
    return $qrcode;

}

// Convert any array to csv
// https://stackoverflow.com/a/13474770
function array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }
   ob_start();
   $df = fopen("php://output", 'w');
   fputcsv($df, array_keys(reset($array)));
   foreach ($array as $row) {
      fputcsv($df, $row);
   }
   fclose($df);
   return ob_get_clean();
}