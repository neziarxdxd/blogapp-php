<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');

        $user_first_name = $_POST["user_first_name"];
        $user_last_name = $_POST["user_last_name"];

        $email = $_POST["user_email"];

        $password = $_POST["user_password"];
        $user_name = strtolower("$user_first_name.$user_last_name");

        $sql = "INSERT INTO `login_user` (`user_name`, `first_name`, `last_name`, `email`, `password`) VALUES ('$user_name', '$user_first_name', '$user_last_name', '$email', '$password');";

        if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        }

        $con->close();
    }
    if(isset($_SESSION["id"])) {
        header("Location:index.php");
    }
?>
<html>
<head>
<title>User Login</title>
</head>
    <body>
    <form name="frmUser" method="post" action="" >
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <h3 >Enter Login Details</h3>
    First Name:
    <br>
    <input type="text" name="user_first_name">
    <br>
    Last Name:
    <br>
    <input type="text" name="user_last_name">
    <br>
    Email:
    <br>
    <input type="text" name="user_email">
    <br>
    Password:<br>
    <input type="password" name="password">
    <br><br>
    <input type="submit" name="submit" value="Submit">
    <input type="reset">
    </form>
    </body>
</html>