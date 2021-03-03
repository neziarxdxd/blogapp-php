
<?php
    error_reporting(0);
    session_start();
?>
<html>

<head>
    <title>User Login</title>
</head>
<style>
    body{
        font-family: Arial, Helvetica, sans-serif;
    }

    pre{
        font-family: Consolas,"courier new";
  color: crimson;
  background-color: #f1f1f1;
  padding: 2px;
  font-size: 105%; 
    }
</style>
<body>
    <div>
        <h1>Write Blog <?php echo $_SESSION["name"]; ?></h1>
    </div>
    <form name="form_blog" method="post" action="" >
    <textarea onkeyup="preview()" type="text" id="TextArea" name="blog_story" ></textarea>
    <input type="submit" name="submit" value="Submit">
    </form>
    <div id="content"></div>
   
    <script src="modules/marked.min.js"></script>
    <script src="modules/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>        
        function preview() {
            $("#content").html(
                marked($("#TextArea").val())
            );
        }        
        
    </script>

    <?php
        if($_SESSION["name"]) {
            if(count($_POST)>0) {
                $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
        
                $blog_story = $_POST["blog_story"];
                $user_id = $_SESSION["id"];
              
                $sql = "INSERT INTO `blog_user` (`user_name`,`blog_story`) VALUES ('$user_id','$blog_story');";
        
                if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                }
        
                $con->close();
            }

    ?><?php




    ?><?php
    }
        else {
        header("Location:login.php");
        };
    ?>
</body>

</html>