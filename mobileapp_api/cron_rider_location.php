<?php


$headers = array(
    "Accept: application/json",
    "Content-Type: application/json"
);

$data = array(
    "id" => "1"
);

$ch = curl_init( "http://api.foodomia.pk/CronJob");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$return = curl_exec($ch);

$json_data = json_decode($return, true);
//var_dump($json_data);

$curl_error = curl_error($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

?>