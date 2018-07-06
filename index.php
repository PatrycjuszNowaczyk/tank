<html>
<head>
    <title>TANK</title>
</head>
<body>
<?php

if (isset($_GET['game'])) {
    if ($_GET['game'] == 'start') {
        $playerName = array('name' => 'Drużyna 4');
        $ch = curl_init('http://tank.iai.ninja/api/join-current-game.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $playerName);
        $result = curl_exec($ch);
        var_dump(json_decode($result, true));
        curl_close($ch);
    }
}
?>
<br><br><br>
<?php
if (isset($_GET['board'])) {
    if ($_GET['board'] == 'get') {
        $ch = curl_init('http://tank.iai.ninja/api/get-current-board.php');
        curl_setopt($ch, CURLOPT_URL, "http://tank.iai.ninja/api/get-current-board.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $jsonResponse = curl_exec($ch);
        $response = json_decode($jsonResponse, true);

        $gameId = $response['id'];
        $gameName = $response['name'];
        $gameBoardSize = $response['settings']['boardSize'];

        $gameBoard = $response['board'];

        ?><table><tr><?php
        foreach($gameBoard as $gb){
            echo '<td>'.$gb['position'].'</td>';
        }
        ?></tr></table><?php
        echo 'Nazwa gry: ' . $gameName . '<br>';
        echo 'plansza:' . $gameBoardSize;

        //require_once('siatka.php');
    }
}
?>
</body>
</html>

<?php

//array(2) { ["errno"]=> int(0) ["data"]=> array(2) { ["id"]=> string(23) "5b3f26e168b3b0.00246468" ["key"]=> string(32) "da72254c2105387ca2a66c96088378db" } }


//$zdekodowane = json_decode($result);
//file_put_contents('index.txt',curl_exec($ch));
//print_r($zdekodowane);
//$dd = json_decode($result = curl_exec($ch),true);
//$json = '{"countryId":"84","productId":"1","status":"0","opId":"134"}';
//$dd = curl_exec($ch);
//$json =  json_decode(curl_exec($ch),true);
//var_dump($json);
//echo '<h1>'.$json['id'].'</h1>';

//echo '<b>'.$dd['id'].'</b>';

//echo $result = curl_exec($ch);
//echo json_decode(curl_exec($ch),true);


//$dd = json_encode($result = curl_exec($ch),true);
//$result = curl_exec($ch);
//echo '<br>';
//json_decode($result)
//echo $result['board'];
//echo $result;
//echo json_encode($result);

//$board =


