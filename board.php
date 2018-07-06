<?php
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

?>
<table>
    <tr><?php
        foreach ($gameBoard as $gb) {

            echo '<td>' . $gb['position'] . '</td>';
        }
        ?></tr></table><?php
echo 'Nazwa gry: ' . $gameName . '<br>';
echo 'plansza:' . $gameBoardSize;


?>