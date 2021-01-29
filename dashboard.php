<?php


$uname = "admin";
$pwd = "admin";
session_start();
if(isset($_SESSION['username'])){
    echo "<h1>Yehey".$_SESSION['username']."</h1>";
    echo "<br> <a href='logout.php'> <input type='button' value=logout name=logout></a>";

}
else{
    if(( $username = $_POST['username'] == $uname) && ($_POST['password'] == $pwd)){
        $_SESSION['username'] = $uname;
       

        echo "<script> location.href = 'dashboard.php' </script>";
    }
    else{
        echo "<script> alert('ONE MORE') </script>";
        echo "<script> location.href ='login.php' </script>";
    
    }
    
    
}

?>