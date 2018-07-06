<!DOCTYPE html>
<html>
<head>
    <title>TANK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<button>Góra</button><br>
<button>Dół</button><br>
<button>Lewo</button>
<button>Prawo</button>
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
        $("#put").click(function(){
            var url = "http://localhost/phppc/index11.php/products/create/"+$('#pname').val()+"/"+$('#pprice').val()+"/";
            $.ajax({
                method: "PUT",
                url: url, success: function(result){
                    $("#show2").html(result);

                }
            });
        });
        $("#edit").click(function(){
            var url = "http://localhost/phppc/index11.php/products/edit/"+$('#wid').val()+"/"+$('#wname').val()+"/"+$('#wprice').val()+"/";
            $.ajax({
                method: "GET",
                url: url, success: function(result){
                    $("#show3").html(result);

                }
            });
        });
    });
</script>
</body>
</html>
