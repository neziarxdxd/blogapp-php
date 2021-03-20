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
                <form method="POST">
                <div class="form-group">
                
                    <input type="text" id="title_edit"  name="blog_title" class="form-control" placeholder="Title">
                </div>
                    <textarea id="editor" name="blog_story" cols="30" rows="10"></textarea>
                    <br>
                <div class="form-group">
                    <input type="text"  class="form-control" placeholder="Tags">
                </div>
                <div class="form-group">
                    <button onclick="testing()" class="btn btn-primary" id="submit" name="update_button">Submit new post</button>
                </div>
            </form>
            </div>
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
            $sql ="SELECT blog_story,blog_id,blog_title FROM `blog_user` WHERE blog_id=$story_id and user_name='$user_name'";
            
            
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result) > 0)  {
                while($row = mysqli_fetch_array($result)){                                  //return true;  
                    $full_content = $row['blog_story'];
                    $_SESSION['blog_id'] = $row['blog_id'];
                    echo $row['blog_id'];
                    $test= $row['blog_id'];
                    echo "<script> console.log($test); </script>";
                    $full_content=mysqli_real_escape_string($con, $full_content);
                    $full_title=mysqli_real_escape_string($con, $row['blog_title']);
                    echo '<script>document.getElementById("title_edit").value = "'.$full_title.'";</script>';
                    echo '<script>document.getElementById("editor").value = "'.$full_content.'";</script>';
                    
                }       
            }  
            if(isset($_POST['update_button'])){
                $blog_story = $_POST["blog_story"];
                $blog_title = $_POST["blog_title"];
                $user_id = $_SESSION["id"];
                echo "test: $user_id"; 
                $blog_id = $_SESSION['blog_id'];
                echo "test01: $blog_id";
                $today_date = date("Y-m-d");
                echo $today_date;
                $insert_data = mysqli_real_escape_string($con, $blog_story);
                // inserting data
                $sql = "UPDATE `blog_user` SET `date_update` = '$today_date',`blog_title` = '$blog_title', `blog_story` = '$insert_data' WHERE `blog_id` = $blog_id;";
                
                if ($con->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header("location:user_profile.php");
                    
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

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