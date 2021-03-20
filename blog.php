<?php
    error_reporting(0);
    session_start();
?>
<html>
<head>
<title>User Login</title>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
</head>
<body>

<?php
    if($_SESSION["name"]) {
    ?>

    <?php    
        require_once 'modules/Parsedown.php';
        $Parsedown = new Parsedown();
        $full_content = "";
        $story_id = $_GET['blogstory'];
        
        $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
        $sql ="SELECT blog_story FROM `blog_user` WHERE blog_id=$story_id";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0)  {
            while($row = mysqli_fetch_array($result)){                                  //return true;  
                $full_content = $row['blog_story'];
            }       
        }
        else{
        echo "error";
        }       
    
        $parsed =  $Parsedown->text('# Hello _Parsedown_! fdd');   
        echo $Parsedown->parse($full_content);
    ?>
<?php
    }
    else {
        header("Location:login.php");
    };
?>

</body>
</html>