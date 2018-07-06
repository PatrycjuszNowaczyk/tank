<html>
<head>
    <title>TANK</title>
</head>
<body>
<H1>Czołgi</H1>
<button id="start">Zacznij gre</button>
<div id="show1">
</div>
<button id="board">Pokaż plansze</button>
<div id="show2">
</div>
<br><br><br>
<table>
    <tr>
        <td></td>
        <td>
            <button type="button" id="n" value="n">N</button>
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
            <button type="button" id="w" value="w">W</button>
        </td>
        <td></td>
        <td>
            <button type="button" id="e" value="e">E</button>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button type="button" id="s" value="s">S</button>
        </td>
        <td></td>
    </tr>
</table>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    // $(document).ready(function(){
    $('#n,#w,#e,#s').on('click', function () {
        let url = 'tank.iai.ninja/api/make-move.php';
        let dir = $(this).val();
        let key = 'asdasa312313asdasas23';
        let moveData = '[{"key":"' + key + '","direction":"' + dir + '","distance":"3","fire": "false"}]';
        alert(moveData);
        $.ajax({
            method: "POST",
            data: moveData,
            url: url, success: function (result) {
                //$("#show").html(result);
            }
        });
    });
    $('#start').on('click', function () {
        $.ajax({
            method: "GET",
            url: "http://localhost/tank/startgame.php", success: function (result) {
                $('#show1').text(result);
            }
        });
    })
    $('#board').on('click', function () {
        $.ajax({
            method: "GET",
            url: "http://localhost/tank/board.php", success: function (result) {
                //let d = d.parseHTML(result);
                //$('#show2').text(result);
                //let dd = let ddd.parse
                //console.log(result);
                $('#show2').html(result);
            }
        });
    })
    // });
</script>
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


