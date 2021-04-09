<?php
   
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
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">
  <link href="css/login-register.css" rel="stylesheet" />
    <script type="text/javascript" src="js-2/jquery-1.10.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script type="text/javascript" src="bootstrap-2/js/bootstrap.min.js"></script>
    
</head>

<body>

<!-- --->
<?php include 'navbar-2.php'; ?>
<?php        if($_SESSION["name"]) {?>

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
                        <input  type="submit" name="submit" class="btn btn-primary" id="submit"></button>
                    
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
</script>
    <?php
        
            if(count($_POST)>0) {
                // connect database 
                include 'connect.php';              
                // get data blog story 
                // TODOS: blog story, blog title, author, date of published,
                
                // inserting data
                $sql = "INSERT INTO `blog_user` (`blog_title`,`user_name`,`blog_story`,`date_publish`) VALUES (?,?,?,NOW());";
                $statement = $con->prepare($sql);
                $blog_story = $_POST["blog_story"];
                $blog_title = $_POST['blog_title'];
                $user_id = $_SESSION["id"]; 
                $today = date("Y-m-d h:i:s");
                $statement->bind_param("sss",$blog_title,$user_id,$blog_story);

                
                
                // messagge if recorded of not
                // TODOS:pop up mesage  
                if ($statement->execute()) {
                echo "New record created successfully";
                echo "<script>window.location.href='user_profile.php';</script>";
                exit;

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