<?php
$playerName = array('name' => 'Drużyna 4');
$ch = curl_init('http://tank.iai.ninja/api/join-current-game.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $playerName);
$result = curl_exec($ch);
var_dump(json_decode($result, true));
curl_close($ch);
