<html>
<head>
    <title>TANK</title>
    <link rel="stylesheet" type="text/css" href="table.css">

</head>
<body style="color: #555659;background-color:#f2f1f0;">
<H1>Czołgi</H1>
<button id="start">Zacznij grę</button>
<div id="show1">
</div>
<button id="board">Pokaż planszę</button>
<div id="show2">
</div>
<br><br><br>
<iframe src="http://tank.iai.ninja/board.php" width="600px" height="600px"></iframe>

<form action="POST" name="move" id="move">
<table>
    <tr>
        <td></td>
        <td>
            <input type="button" value="n" id="n">N</input>
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
          <td></td>
            <button type="button" id="w" value="w">W</button>
        </td>
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
    Kierunek:<input type="text" name="direction"><br>
Klucz:<input type="text" name="key"><br>
    Dystans:
    <select name="distance">
        <option value="1">Ruch o 1</option>
        <option value="2">Ruch o 2</option>
        <option value="3">Najdalszy dystans strzału</option>
    </select>
    <br>
    STRZELAĆ?
    <select name="distance">
        <option value="1">TAK</option>
        <option value="0">NIE</option>
    </select>
    <button type="submit">submit</button>
</form>
<style>
    button{
        background-color: #f2f1f0;
        padding:10px;
        padding-left:15px;
        padding-right:15px;
        margin:auto;
        border: 1px solid rgb(192,191,190);
        border-radius: 3px;
        margin: 5px;
    }
    input{
        background-color: #f2f1f0;
        padding:10px;
        padding-left:15px;
        padding-right:15px;
        margin:auto;
        border: 1px solid rgb(192,191,190);
        border-radius: 3px;
        margin: 5px;
    }
</style>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    // $(document).ready(function(){
    //$('#n,#w,#e,#s').on('click', function (e) {
        $('#move').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: 'move.php',
            data: $('#move').serialize(),
            success: function (response) {
                //alert(response);
                //$("#logged-panel").load(" #logged-panel");
                //location.reload();
            }
        });

    });
    /*
    $('#n,#w,#e,#s').on('click', function () {
        let url = 'http://localhost/tank/startgame.php';
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
    */
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
