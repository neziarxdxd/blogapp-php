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

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'> -->
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <script type="text/javascript" src="js-2/jquery-1.10.2.min.js"></script>
  
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <!-- ADD -->

    
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
     
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
    </form>
  </div>
</nav>
<!-- New Blog Post - START -->
<div class="container">
    <div class="row" id="row_style">
        <h4 class="text-center">Submit new post</h4>
        <div class="col-md-12   col-md-offset-12">
        <form method="POST" name="submit">
                <div class="form-group">
                    <input type="text" name="blog_title" class="form-control" placeholder="Title">
                </div>
                    <textarea id="editor" name="blog_story" cols="30" rows="10"></textarea>
            <br>
            
                    <div class="form-group">
                        <input onclick="testing()" type="submit" name="submit" class="btn btn-primary" id="submit"></button>
                    
                    </div>
        
        </form>
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
                $blog_title = $_POST['blog_title'];
                $user_id = $_SESSION["id"]; 
                $today = date("Y-m-d");
                
                

                $insert_data = mysqli_real_escape_string($con, $blog_story);
                // inserting data
                $sql = "INSERT INTO `blog_user` (`blog_title`,`user_name`,`blog_story`, `date_update`,`date_publish`) VALUES ('$blog_title','$user_id','$insert_data','$today','$today');";

                
                
                // messagge if recorded of not
                // TODOS:pop up mesage  
                if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
                header("location:user_profile.php");
                } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                }
        
                $con->close();
            }
    ?><?php
    ?><?php
    }
        else {
        header("Location:index.php");
        };
    ?>

</body>


</html>