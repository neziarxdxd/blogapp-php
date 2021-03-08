<?php
error_reporting(0);

session_start();
?>
<html>
<head>
<title>User Login</title>
</head>
<body>

<?php
    if($_SESSION["name"]) {

        
    ?>
        Welcome <?php echo $_SESSION["name"]; ?>.
        <br>
        <a href="writer.php">Write post</a>
        <br>Click here to <a href="logout.php" tite="Logout">Logout.

        
<?php

    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>