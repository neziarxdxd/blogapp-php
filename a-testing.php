<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');

        $user_first_name = $_POST["user_first_name"];
        $user_last_name = $_POST["user_last_name"];

        $email = $_POST["user_email"];

        $password = $_POST["password"];
        $user_name = $_POST["user_name"];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql_query = "SELECT * FROM user_name='$user_name' or email='$email'";
        $sql = "INSERT INTO `login_user` (`user_name`, `first_name`, `last_name`, `email`, `password`,`full_name`) VALUES ('$user_name', '$user_first_name', '$user_last_name', '$email', '$hash','$user_first_name $user_last_name ');";
        if($con->query($sql_query) === TRUE){
            echo "There is existing email or username ";
        }
        else{
            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                }
        }       

        $con->close();
    }
    
    if(isset($_SESSION["id"])) {
        header("Location:login.php");
    }
?>