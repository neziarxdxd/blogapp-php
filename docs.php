<?php
  
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
            <a class="nav-link" href="index.php">Back</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation -->

 
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
            <h1>Documentation</h1>
            <span class="subheading">Blog Matters Official Documentation</span>
            
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
    <h1>BLOG MATTERS</h1><div>by Group 2</div><div><br></div><div>Created by:</div><div><br></div><div><ul><li>Joash Requiez</li><li>Joshua Bautista</li><li>Raizen Sangalang</li></ul></div><h2>What it does</h2><div>Our project addresses the writing blog by doing an application that does blog writing with formatting for the ease of making blogs.</div><div><br></div><h2>How We built it</h2><div>Our team used PHP, HTML, XAMPP+SQL, CSS, JavaScript, and deployed our project to localhost. for ease of access!</div><div><br></div><h2>Challenges We ran into</h2><div>This was our first project that related to web development, We didn't know how to code before this semester! we didn't know how to reach the egress point of our simulated service. Whatever you ran into, overcame, or we're unable to solve, let everyone know here.</div><div><br></div><h2>Accomplishments that We are proud of</h2><div>The download feature application, it is really awesome to see what you write is actually printable and downloadable</div><div><br></div><h2>What we learned</h2><div>Check out some of these photos of our hack in action!!</div><div>Built With</div><div><ul><li>HTML</li><li>CSS</li><li>JavaScript</li><li>JQuery</li><li>PDF Module</li><li>SQL</li><li>PHP</li></ul></div><h1>Thank you !!!</h1>    <div style="padding-top: 50px;">
    <span class="subheading"><a href="http://localhost/blogapp-php/render.php?blogstory=1082">Download PDF &nbsp;<i class="fa fa-download"></i></a></span> </div>
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
       

</body>
</html>