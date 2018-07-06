<?php

$address='http://tank.iai.ninja/api/join-current-game.php';
$player='{ "name":"Grupa4"}';


function httpPost($url, $data)
{
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_POST, true);
   curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(json_decode($data,true)));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   curl_close($curl);
   return $response;
}


print_r(httpPost($address,$player));
