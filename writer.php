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
    <?php
    require_once 'Parsedown.php';
    $Parsedown = new Parsedown();

    echo $Parsedown->text('# Hello _Parsedown_!<br> fdd');
    echo $Parsedown->parse('# Hello _Parsedown_!<br> fdd');

    ?>
<?php
    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>