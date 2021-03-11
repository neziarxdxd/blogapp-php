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
        <h1>Write Blog</h1>
    </div>
    <form name="myForm" method="post" action="update_post.php" >
    <textarea onkeyup="preview()" type="text" id="TextArea" name="blog_story" value="fgf" >
      
    </textarea>
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
        
        $("#submit").click( function() {
        $.post( $("#myForm").attr("action"), 
                $("#myForm :input").serializeArray(), 
                function(info){ $("#result").html(info); 
        });
        clearInput();
        });
        
        $("#myForm").submit( function() {
        return false;
        });
        
        function clearInput() {
        $("#myForm :input").each( function() {
        $(this).val('');
        });
        }
    </script>
    <?php
        if($_SESSION["name"]) {
            ?>
            <?php
            
            require_once 'modules/Parsedown.php';
            $Parsedown = new Parsedown();
            
            $story_id = $_GET['edit-blog'];
            $full_content = "";
            $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
            $user_name = $_SESSION['id'];
            $sql ="SELECT blog_story,blog_id FROM `blog_user` WHERE blog_id=$story_id and user_name='$user_name'";
            
            
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0)  {
                while($row = mysqli_fetch_array($result)){                                  //return true;  
                    $full_content = $row['blog_story'];
                    $_SESSION['blog_id'] = $row['blog_id'];
                    echo $row['blog_id'];
                    $test= $row['blog_id'];
                    echo "<script> console.log($test); </script>";
                    $full_content=mysqli_real_escape_string($con, $full_content);
                    echo '<script>document.getElementById("TextArea").value = "'.$full_content.'";</script>';
                    
                }       
            }
            else{
                echo "error";
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