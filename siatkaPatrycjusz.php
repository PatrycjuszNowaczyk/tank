<html>
<head>
    <title>TANK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>
<?php

function getBoardArray($url)
{
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $response = curl_exec($curl);
   curl_close($curl);
   $response=json_decode($response,true);
   return $response;
}
$boardArray=getBoardArray('http://tank.iai.ninja/api/get-current-board.php');
echo '<pre>';
echo json_encode($boardArray);
echo '</pre>';
$tablica = array();
$color = 'white';

function createBoard($size) {

    $table = '';

    $table .= '<table style="border-collapse: collapse">';
    foreach (range(1, $size) as $row) {
        $table .= "<tr>";
        foreach (range('A', chr($size-1+ord('A'))) as $col) {
            $tablica[$col][$row] = $col . $row;
            $table .= '<td style="width: 25px; height: 25px;  border-collapse: collapse; border: 1px solid black; vertical-align: ';
            $table .= 'top">' . $tablica[$col][$row] . '</td>';
        }
        $table .= "</tr>";
    }
    $table .= "</table>";

    $table .= str_repeat("<br>", 3);

//Tabela przyciskow
    $table .= '<table>';
    $table .= '<tr>';
    $table .= '<td></td>';
    $table .= '<td><button type="button" id="n">N</button></td>';
    $table .= '<td></td>';
    $table .= '</tr>';
    $table .= '<tr>';
    $table .= '<td><button type="button" id="w">W</button></td>';
    $table .= '<td></td>';
    $table .= '<td><button type="button" id="e">E</button></td>';
    $table .= '</tr>';
    $table .= '<tr>';
    $table .= '<td></td>';
    $table .= '<td><button type="button" id="s">S</button></td>';
    $table .= '<td></td>';
    $table .= '</tr>';
    $table .= '</table>';


    echo $table;
}

$gameBoardSize=25;
createBoard($gameBoardSize);
//createBoard(20);

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
