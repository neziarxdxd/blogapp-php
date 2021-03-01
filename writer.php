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
<?php
    if($_SESSION["name"]) {
    ?>
    <?php
    
    

    ?>
<?php
    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>