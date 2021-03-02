<?php
    error_reporting(0);
    session_start();
?>
<html>

<head>
    <title>User Login</title>
</head>

<body>
    <div>
        <h1>Write Blog </h1>
    </div>
    
<textarea onkeyup="preview()" type="text" id="TextArea" ></textarea>
    <div id="content"></div>
    <button onclick="testPHP()" id="testButton">testing</button>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>        
        function preview() {
            $("#content").html(
                marked($("#TextArea").val())
            );
        }        
        
    </script>

    <?php
        if($_SESSION["name"]) {
            
    ?><?php




    ?><?php
    }
        else {
        header("Location:login.php");
        };
    ?>
</body>

</html>