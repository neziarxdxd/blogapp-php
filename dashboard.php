<?php

$username = $_POST['username'];
$password = $_POST['password'];

session_start();
if(isset($_SESSION['username'])){
    echo "Yehey";
}
else{
    
}

?>