<?php
   // error_reporting(0);
    session_start();
    
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="img/logo2.png">
  <title>Blog Matters</title>

  


  <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

    <link rel="stylesheet" type="text/css" href="font-awesome-2/css/font-awesome.min.css" />

    <script type="text/javascript" src="js-2/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap-2/js/bootstrap.min.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet"/>
  <link href="css/login-register.css" rel="stylesheet" />
</head>
<body>


 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
     <div class="container-fluid">
     <a class="navbar-brand" href="index.html"><img style ="max-height:100px; "src="img/logo.png" p></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Logout</a>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/userprof.jpg')">
     <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Welcome Back!</h1>
            <span class="subheading">Name</span>
          </div>
        </div>
      </div>
    </div>
  </header>


<!-- New Blog Post - START -->
    <div class="container">
    <div class="row" id="row_style">
        <h4 class="display-4">Update Your Story Here:</h4>
        <div class="col-md-12   col-md-offset-12">

            </div>
        </div>
 <div class="card" style="width: 100;">
  <form method="POST">
    <div class="card-header"> <div class="form-group">
                
                    <input type="text" id="title_edit"  name="blog_title" class="form-control" placeholder="Title">
                </div></div>
    <div class="card-body "> <textarea id="editor" name="blog_story" cols="30" rows="10"></textarea>
                    </div> 
    <div class="card-footer pull-right"><button name="update_button" href="#" class="btn btn-primary" onClick="testing()" ><i class="fa fa-check-square fa-lg"></i> Submit</button>
    &nbsp;<a href="#" class="btn btn-danger" onmousedown="testing()" ><i class="fa fa-window-close fa-lg"></i> Cancel</a>
</div>
  </form>
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
<!--  <script src="vendor/jquery/jquery.min.js"></script> -->
<?php
        if($_SESSION["name"]) {
            ?>
            <?php
            
            require_once 'modules/Parsedown.php';
            $Parsedown = new Parsedown();
            
      
            $full_content = "";
            include 'connect.php';
            
            $statement =  $con->prepare("SELECT * FROM `blog_user` WHERE blog_id=? and user_name=?");
            $story_id = $_GET['edit-blog'];
            $user_name = $_SESSION['id'];
            
            $statement->bind_param("ss",$story_id,$user_name);
            
            $statement->execute();
            
            $result = $statement->get_result();            
            

            if(mysqli_num_rows($result) > 0)  {
                while($row = $result->fetch_assoc()){                                  //return true;  
                    $full_content = $row['blog_story'];
                    $_SESSION['blog_id'] = $row['blog_id'];
                   
                    $test= $row['blog_id'];
                    echo "<script> console.log($test); </script>";
                    $full_content=mysqli_real_escape_string($con, $full_content);
                    $full_title=mysqli_real_escape_string($con, $row['blog_title']);
                    echo '<script>document.getElementById("title_edit").value = "'.$full_title.'";</script>';
                    echo '<script>document.getElementById("editor").value = "'.$full_content.'";</script>';
                    
                }       
            }  
            if(isset($_POST['update_button'])){
               
                
               
                // inserting data
                $sql = "UPDATE `blog_user` SET `blog_title`=?, `date_update`=NOW() , `blog_story` =? WHERE `blog_id`=?;";
                $statement = $con->prepare($sql);
                $blog_story = $_POST["blog_story"];
                $blog_title = $_POST["blog_title"];
                $user_id = $_SESSION["id"];
             $insert_data = mysqli_real_escape_string($con, $blog_story);
        
                $blog_id = $_SESSION['blog_id'];          
                $today = date("Y-m-d h:i:s");
                $statement->bind_param("sss",$blog_title,$insert_data,$blog_id);

                if ($statement->execute()) {
                    
                    echo "<script>window.location.href='user_profile.php';</script>";
                    exit;
                    
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

            }        


          
    
            
            ?><?php
    ?><?php
    }
        else {
        header("Location:index.php");
        };
    ?>


  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/main.min.js"></script>
  <script src="js/login-register.js" type="text/javascript"></script>

</body>
</html>





   