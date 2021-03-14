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
    <?php
        
        if($_SESSION["name"]) {
            if(count($_POST)>0) {
                // connect database 
                $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
                
                // get data blog story 
                // TODOS: blog story, blog title, author, date of published,
                $blog_story = $_POST["blog_story"];
                $user_id = $_SESSION["id"]; 
                $insert_data = mysqli_real_escape_string($con, $blog_story);
                // inserting data
                $sql = "INSERT INTO `blog_user` (`user_name`,`blog_story`) VALUES ('$user_id','$insert_data');";

                
                
                // messagge if recorded of not
                // TODOS:pop up mesage  
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