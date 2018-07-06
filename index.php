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
    <form action="POST" name="move" id="move">
        <table>
            <tr>
                <td></td>
                <td>
                    <button type="button" value="n" id="n">N</input>
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
        Kierunek:<input type="text" name="direction"><br> Klucz:
        <input type="text" name="key"><br> Dystans:
        <select name="distance">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
    </select>
        <br> STRZELAĆ? (1 TAK, 0 - NIE)
        <select name="fire">
        <option value="1">1</option>
        <option value="0">0</option>
    </select>
        <button type="submit">Wykonaj ruch!</button>
    </form>
    <style>
        body {
            color: #555659;
            background-color: #f2f1f0;
            padding: 20px;
        }
        
        button {
            background-color: #f2f1f0;
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
            margin: auto;
            border: 1px solid rgb(192, 191, 190);
            border-radius: 3px;
            margin: 5px;
        }
        
        input,select {
            background-color: #f2f1f0;
            padding: 10px;
            padding-left: 15px;
            padding-right: 15px;
            margin: auto;
            border: 1px solid rgb(192, 191, 190);
            border-radius: 3px;
            margin: 5px;
        }
        
        table,
        td,
        th {
            border: 1px solid rgb(192, 191, 190);
        }

    </style>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        setInterval(function() {
            $.ajax({
                method: "GET",
                url: "http://localhost/tank/board.php",
                success: function(result) {
                    $('#show2').html(result);
                }
            });
        }, 1000);
        $('#move').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'post',
                url: 'move.php',
                data: $('#move').serialize(),
                success: function(response) {

                }
            });

        });
        $('#start').on('click', function() {
            $.ajax({
                method: "GET",
                url: "http://localhost/tank/startgame.php",
                success: function(result) {
                    $('#show1').text(result);
                }
            });
        })
        $('#board').on('click', function() {
            $.ajax({
                method: "GET",
                url: "http://localhost/tank/board.php",
                success: function(result) {
                    $('#show2').html(result);
                }
            });
        })

    </script>
</body>

</html>
