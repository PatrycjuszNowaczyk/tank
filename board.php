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
	$gameBoardNew = array();
	$gamers = array();

	foreach ($gameBoard as $val) {
		$gameBoardNew[$val['position']] = $val['type'];
		$gamers = $val['name'];
	}

	$gamers = array_unique($gamers);
	
	$tablica = array();

    $table = '';

    $table .= '<table style="border-collapse: collapse">';
    foreach (range(1, $gameBoardSize) as $row) {
        $table .= "<tr>";

		$letters = array();
		$lastLetter = chr($gameBoardSize-1+ord('A'));

		if (ord($lastLetter) > ord('Z')) {
			$letters = range('A', 'Z');
			foreach(range('A', 'Z') as $letter1) {
				foreach(range('A', 'Z') as $letter2) {
					$letters[] = $letter1 . $letter2;
					$letters = array_slice($letters, 0, $gameBoardSize);
				}
			}
		}
		else {
			$letters = range('A', chr($gameBoardSize-1+ord('A')));
		}

        foreach ($letters as $col) {
            $tablica[$col][$row] = $col . $row;
            $id = $col . $row;
            $style = $gameBoardNew[$id];

            $table .= '<td id="'. $id . '_'.'" class="' . $class . '" style="width: 25px; height: 25px;  border-collapse: collapse; border: 1px solid black; vertical-align: ';
            $table .= 'top">' . $tablica[$col][$row] . '</td>';
        }
        $table .= "</tr>";
    }
	
    $table .= "</table>";

    $table .= str_repeat("<br>", 1);

    echo $table;


?>
