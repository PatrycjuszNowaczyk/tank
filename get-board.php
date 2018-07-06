<?php

/*
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
*/

$ch = curl_init('http://tank.iai.ninja/api/get-current-board.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
$boardArray=json_decode($result);
$boardSize=$boardArray->settings->boardSize;
echo '<pre>';
var_dump($boardSize);
echo '</pre>';
?>

<table style="border-style:groove;border-color:coral;border-width:1px;">
<?php


for($i = 0; $i < $boardSize; $i++){
  echo '<tr>';
  for($i = 0; $i < $boardSize; $i++){
    echo '<td></td>';
  }
  echo '</tr>';
}
