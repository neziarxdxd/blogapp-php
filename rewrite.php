<?php
    error_reporting(0);
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>New Blog Post Template | PrepBootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap-2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome-2/css/font-awesome.min.css" />

    <script type="text/javascript" src="js-2/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap-2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<div class="page-header">
    <h1>New Blog Post <small>A responsive blog post template</small></h1>
</div>

<!-- New Blog Post - START -->
<div class="container">
    <div class="row" id="row_style">
        <h4 class="text-center">Submit new post</h4>
        <div class="col-md-4   col-md-offset-4">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title">
            </div>
            <textarea id="editor" cols="30" rows="10"></textarea>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tags">
            </div>
            <div class="form-group">
                <button onclick="testing()" class="btn btn-primary" id="submit">Submit new post</button>
            </div>
        </div>
    </div>
</div>

<style>
    #row_style {
        margin-top: 30px;
    }

    #submit {
        display: block;
        margin: auto;
    }
</style>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script>
    $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })
	
	function testing(){
		var textGet=document.getElementById("editor").value;
		console.log(textGet);
		
	}
</script>
<!-- New Blog Post - END -->

</div>

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