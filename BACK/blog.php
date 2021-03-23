<?php
    error_reporting(0);
    session_start();
?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="img/logo2.png">
  <title>Blog Matters</title>

  <!-- Bootstrap core CSS -->
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

</head>

<body>

  <!-- Navigation -->
  <?php include 'navbar.php'?>
  <?php
    if($_SESSION["name"]) {
    
        require_once 'modules/Parsedown.php';
        $Parsedown = new Parsedown();
        $full_content = "";
        $story_id = $_GET['blogstory'];
        $title_blog="";
        $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');
        $sql ="SELECT * FROM `blog_user` WHERE blog_id=$story_id";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result) > 0)  {
            while($row = mysqli_fetch_array($result)){                                  //return true;  
                $full_content = $row['blog_story'];
                $title_blog = $row['blog_title'];
                
            }       
        }
        else{
        echo "error";
        }


    ?>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
            <h1><?php echo $title_blog; ?></h1>
            <span class="subheading"> <?php echo $_SESSION["name"]; ?></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="container">
    <div class="container">
   
    </div>


    <?php    
              
    
        
        echo $Parsedown->parse($full_content);
    ?>


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

  


  
  

<!-- -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/main.min.js"></script>
  <script src="js/login-register.js" type="text/javascript"></script>


  <script>
$(document).ready(function(){
  
//   $( "[id='deleteID']" ) .each(function(){
//       console.log($(this).val())
// })


// $("[id='#deleteID']").click(function(e) {  
//       alert(1);
//     });

  $("deleteBtnID").on(
    'click',function(){
      var textx = $("deleteID").val();
      document.getElementById("deleteBlog").value = textx;
      $('#exampleModal').modal('show');

    }
  );
});
</script>
       
    
<?php
    }
    else {
        header("Location:index.php");
    };
?>
</body>
</html>