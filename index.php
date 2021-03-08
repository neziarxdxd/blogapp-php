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
$con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
$sql ="SELECT blog_story FROM `blog_user` WHERE blog_id=$story_id";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)  {
    while($row = mysqli_fetch_array($result)){                                  //return true;  
       echo $row['blog_story'];
    }       
}
else{
echo "error";
}
    }

    else {
        header("Location:login.php");
    };
?>
</body>
</html>