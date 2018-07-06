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


<html>
<head>
    <title>TANK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php

$tablica = array();
$color = 'white';

function createBoard($size) {

    $table = '';

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
            $table .= '<td style="width: 25px; height: 25px;  border-collapse: collapse; border: 1px solid black; vertical-align: ';
            $table .= 'top">' . $tablica[$col][$row] . '</td>';
        }
        $table .= "</tr>";
    }
    $table .= "</table>";

    $table .= str_repeat("<br>", 1);




    echo $table;
}


createBoard($gameBoardSize);
//createBoard(40);

?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#see").click(function(){
            var url = "http://localhost/phppc/index11.php/products/";
            $.ajax({
                method: "GET",
                url: url, success: function(result){
                    $("#show").html(result);
                    $("button.delete").on('click', function() {
                        var url = "http://localhost/phppc/index11.php/products/"+$(this).attr("value");
                        $.ajax({
                            method: "DELETE",
                            url: url, success: function(result){
                                $("#show").html(result);
                            }
                        });
                    });

                }
            });
        });

    });
</script>
</body>
</html>
