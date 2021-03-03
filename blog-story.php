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
    $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
    $sql ="SELECT blog_story FROM `blog_user` WHERE blog_id=1006";
    $result = mysqli_query($con,$sql);
    
    $parsed =  $Parsedown->text('# Hello _Parsedown_! fdd');
    echo strip_tags($parsed);
    echo $Parsedown->parse('# Hello _Parsedown_! <br> fdd');

    
    echo $Parsedown->line('# Hello _Parsedown_!<br> ');
    $class_methods = get_class_methods(new Parsedown());

    foreach ($class_methods as $method_name) {
        echo "$method_name\n";
    }

    ?>
<?php
    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>