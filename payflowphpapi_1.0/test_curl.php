<?php
error_reporting(E_ALL); ini_set('display_errors', TRUE); ini_set('display_startup_errors', TRUE); 

$handle = curl_init();



$url = "https://www.ladygaga.com";


// Set the url
curl_setopt($handle,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($handle, CURLOPT_URL, $url);

// Set the result output to be a string.
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

if (curl_exec($handle) === FALSE) {
   die("Curl Failed: " . curl_error($handle));
} else {
   return curl_exec($handle);
}
 
$output = curl_exec($handle);
/*print_r(curl_getinfo($handle));
 exit;*/
 
 

curl_close($handle);

echo $output;
