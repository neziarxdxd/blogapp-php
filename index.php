<?php
    session_start();
    include 'connect.php';
    $message="";

    if(isset($_POST["register_button"])) {     

     

      
      $sql_query = "SELECT * FROM user_name=? or email=?";
      $statementQuery =  $con->prepare($sql_query);
      $user_nameQuery = $_POST["user_name"];
      $email_Query = $_POST["user_email"];
      $statementQuery->bind_param("ss",$user_nameQuery,$email_Query);
      $queryResult =$statementQuery->execute();


      $user_first_name = $_POST["user_first_name"];
      $user_last_name = $_POST["user_last_name"];
      $email = $_POST["user_email"];
      $password = $_POST["password"];
      $user_name = $_POST["user_name"];      
      $user_fullName = "$user_first_name $user_last_name";
      $hash = password_hash($password,PASSWORD_DEFAULT);

      $sql_insert = "INSERT INTO `login_user` (`user_name`, `first_name`, `last_name`, `email`, `password`,`full_name`) VALUES (?,?,?,?,?);";
      $statementInsert = $con->prepare($sql_insert);     
      $statementInsert->bind_param("sssss", $user_name,$user_first_name,$user_last_name, $email, $hash,$user_fullName);
      
      if($queryResult){
          echo "There is existing email or username ";
      }
      else{
          if ($statementInsert->execute()) {
              echo "New record created successfully";
              } else {
                echo '<script>alert("Wrong User Details")</script>';
              }
      }       

      $con->close();
  } 
  

    if(isset($_POST["login_button"])) {
        
        $statement =  $con->prepare("SELECT * FROM login_user WHERE user_name=?");
        $userName=$_POST["user_name"];
        $statement->bind_param("s",$userName);            
        $statement->execute();            
        $result = $statement->get_result();  

        
        if(mysqli_num_rows($result) > 0)  {
            while($row = mysqli_fetch_array($result)){
                if(password_verify($_POST["password"], $row["password"])){  
                          //return true;  
                        $_SESSION["id"] = $row['user_name'];
                        $_SESSION["name"] = $row['full_name'];  
                     }  
                     else  
                     {  
                          //return false;  
                          echo '<script>alert("Wrong User Details")</script>';  
                     }  
            }
            
        }
        else{
        $message = "Invalid Username or Password!";
        }
    }
    if(isset($_SESSION["id"])) {
        header("Location:user_profile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Blog Matters</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">
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
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Docs</a>
          </li>
         
        
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" href="javascript:void(0)" onmousedown="openLoginModal();">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" href="javascript:void(0)" onmousedown="openRegisterModal();">Register</a></div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Blog Matters</h1>
            <span class="subheading">By Group 2</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php
    $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
    $result = mysqli_query($con,"SELECT blog_user.*, login_user.first_name,login_user.last_name FROM `blog_user` inner join login_user on blog_user.user_name = login_user.user_name order by date_update desc");
  
    while($row = mysqli_fetch_array($result)){   
        $title = $row['blog_title'];
        $full_name = $row['first_name'] . " ".$row['last_name'];
        $time = strtotime($row['date_update']);
        $newformat = date('F j, Y',$time);
          
        echo " 
        <hr>
        <div class='post-preview'>
         
            <h2 class='post-title'>
             $title
            </h2>
        
          <p class='post-meta'>Posted by
            <a href='#'>$full_name</a>
            on $newformat</p>
        </div>
       
        ";}?>
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; BLOG-APP Group</p>
        </div>
      </div>
    </div>
  </footer>

  


     <div class="modal fade login" id="loginModal">
          <div class="modal-dialog login animated">
              <div class="modal-content">
                 <div class="modal-header">
                   <h4 class="modal-title">Login with</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       
                    </div>

                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                      
                                <hr class="dashed">
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="post" action="" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="user_name">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                     <input class="btn btn-default btn-login" name ="login_button" type="submit" value="Login" >
                                    </form>
                                </div>
                             </div>
                        </div>

                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="post" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                <input placeholder="First Name" class="form-control" type="text" name="user_first_name" onkeyup="preview()" id="user_first" required>
                                <input placeholder="Last Name"  class="form-control" type="text" name="user_last_name" onkeyup="preview()" id="user_last" required>
                                <input placeholder="User Name" class="form-control" type="text" name = "user_name" id="userName" required>
                                <input placeholder="Email" class="form-control" type="text" name="user_email" required>
                                <input placeholder="Password" class="form-control" type="password" name="password" required>
                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="register_button">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
              </div>
          </div>
      </div>
  

<!-- -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/main.min.js"></script>
  <script src="js/login-register.js" type="text/javascript"></script>

</body>

</html>