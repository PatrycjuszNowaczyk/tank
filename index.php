<html>
<head>
    <title>TANK</title>
    <link rel="stylesheet" type="text/css" href="table.css">

</head>
<body>
<H1>Czołgi</H1>
<button id="start">Zacznij grę</button>
<div id="show1">
</div>
<button id="board">Pokaż planszę</button>
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
Klucz:<input type="text" id="key"><br>
Dystans:<input type="text" id="distance"><br>
Strzelac?(true/false):<input type="text" id="fire"><br>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    // $(document).ready(function(){
    $('#n,#w,#e,#s').on('click', function () {
        let url = 'tank.iai.ninja/api/make-move.php';
        let dir = $(this).val();
        let dist = $("#distance").val();
        let fire = $("#fire").val();
        let key = $("#key").val();
        let moveData = '[{"key":"' + key + '","direction":"' + dir + '","distance":"' + dist + '","fire": "' + fire + '"}]';
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
                $('#show2').html(result);
            }
        });
    })
    // });
</script>
</body>
</html>
