<?php
  error_reporting(0);
  session_start();

  if($_SESSION["name"]) {
    $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
 $blog_story = $_POST["blog_story"];
 $user_id = $_SESSION["id"];
 echo "test: $user_id"; 
 $blog_id = $_SESSION['blog_id'];
 echo "test01: $blog_id";
 $today_date = date("Y-m-d");
 echo $today_date;
 $insert_data = mysqli_real_escape_string($con, $blog_story);
 // inserting data
 $sql = "UPDATE `blog_user` SET `date_update` = '$today_date', `blog_story` = '$insert_data' WHERE `blog_id` = $blog_id;";
 
 if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }

    $con->close();

}
else{
    header("Location:login.php");
}

?>