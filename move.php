<?php
echo 'ruszyl sie';
$key = $_POST['key'];
$dir = $_POST['direction'];
$dist = $_POST['distance'];
$fire = $_POST['fire'];
$dane = array('key' => $key,
    'direction' => $dir,
    'distance' => $dist,
    'fire' => $fire);
$ch = curl_init('http://tank.iai.ninja/api/make-move.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $dane);
$result = curl_exec($ch);
var_dump(json_decode($result, true));
curl_close($ch);