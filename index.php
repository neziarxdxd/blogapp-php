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
        <?php
    $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
    $result = mysqli_query($con,"SELECT * FROM blog_user WHERE user_name='" . $_SESSION["id"]."'");
    $row = mysqli_fetch_array($result);
  
    
   
    while($row = mysqli_fetch_array($result)){
         
                  //return true;  
                echo "<p><a href='blog.php?blogstory=".$row['blog_id']."'>Data:".$row['blog_id']."</a></p>";
                 
              
    }



    
    ?>
        <a href="writer.php">Write post</a>
        <br>Click here to <a href="logout.php" tite="Logout">Logout.</a>
    
        
<?php

    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>