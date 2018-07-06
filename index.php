<?php

if(isset($_GET['board'])){
    if($_GET['board'] == 'get'){
        $ch = curl_init('http://tank.iai.ninja/api/get-current-board.php');
        curl_setopt($ch, CURLOPT_URL, "http://tank.iai.ninja/api/get-current-board.php");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        //json_encode($result = curl_exec($ch));
        $result = curl_exec($ch);
        //echo $result;
        //echo json_encode($result);

    }
}

//$board =


