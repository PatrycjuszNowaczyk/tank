
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
$size=$gameBoardSize;
$gameBoard = $response['board'];
$gameBoardNew = array();

foreach ($gameBoard as $val) {
  $gameBoardNew[$val['position']] = $val['type'];
}

echo '<pre>';
print_r(array_unique($gameBoardNew));
echo '</pre>';

$tablica = array();
$color = 'white';



    $table = '';
    $id = '';
    $class = '';

    $table .= '<table style="border-collapse: collapse">';
    foreach (range(1, $size) as $row) {
        $table .= "<tr>";

		$letters = array();
		$lastLetter = chr($size-1+ord('A'));

		if (ord($lastLetter) > ord('Z')) {
			$letters = range('A', 'Z');
			foreach(range('A', 'Z') as $letter1) {
				foreach(range('A', 'Z') as $letter2) {
					$letters[] = $letter1 . $letter2;
					$letters = array_slice($letters, 0, $size);
				}
			}
		}
		else {
			$letters = range('A', chr($size-1+ord('A')));
		}

        foreach ($letters as $col) {
            $tablica[$col][$row] = $col . $row;
            $id = $col . $row;
            $style = $gameBoardNew[$id];
//$style
// var_Dump($id );
            $table .= '<td id="'. $id . '_'.'" class="' . $class . '">' . $tablica[$col][$row] . '</td>';
        }
        $table .= "</tr>";
    }
    $table .= "</table>";

    $table .= str_repeat("<br>", 1);




    echo $table;




//createBoard(40);

?>
