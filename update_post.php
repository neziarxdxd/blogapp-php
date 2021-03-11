<?php
 $blog_story = $_POST["blog_story"];
 $user_id = $_SESSION["id"]; 
 $blog_id = $_SESSION["blog_id"];
 $today_date = date("Y-m-d");
 $insert_data = mysqli_real_escape_string($con, $blog_story);
 // inserting data
 $sql = "UPDATE `blog_user` SET `date_update` = $today_date, `blog_story` = $insert_data WHERE `blog_id` = $blog_id;";
?>