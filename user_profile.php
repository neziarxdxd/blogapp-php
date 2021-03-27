<?php

session_start();
?>
<html>
<head>
<title>User Login</title>
</head>


<!DOCTYPE html>
<html lang="en">

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
<?php include 'navbar.php'; ?>
  <?php
    if($_SESSION["name"]) {    
    ?>    
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/userprof.jpg')">
  	 <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Welcome!</h1>
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
    <div class="row">  
  <h2>List of your works</h2>
  <li class="list-inline-item" style="margin-left: 320px; margin-bottom: 25px;">
              <a href="writer.php">
                <span class="fa-stack fa-lg">
                 <i class="far fa-plus-square fa-2x"></i>
                </span>
              </a>
            </li>
            <br>
          </div>
    </div>
    <?php
    include 'connect.php';
    $result = mysqli_query($con,"SELECT * FROM blog_user WHERE user_name='" . $_SESSION["id"]."' ORDER BY `blog_user`.`date_update` DESC  ");
  
    while($row = mysqli_fetch_array($result)){   
        $time = strtotime($row['date_update']);
        $newformat = date('F j, Y',$time);
        $blog_id = $row['blog_id'];
        echo "  <div class='card'>      
          <div class='card-body'>
          <div class=' h2 font-weight-bold'><a href='blog.php?blogstory=".$row['blog_id']."'>".htmlspecialchars($row['blog_title'])."</a></div> 
          Date Publish: ".$newformat." </div>         
          <div class='card-footer '>
         
          <a href='rewrite.php?edit-blog=".$row['blog_id']."' class='btn btn-primary'><i class='fas fa-edit'></i>Edit</a>&nbsp;
          <a href='#' data-href='delete.php?delete_id=$blog_id' data-toggle='modal' class='btn btn-danger deleteButton' data-target='#confirm-delete'>
          <i class='fa fa-trash-o fa-lg'></i>
          Delete</a>

          </div>
          
         
          
          
        </div><br>";  
                    
     }

    // <a href='' data-href='/delete.php' data-target='#exampleModal' data-toggle='modal' id='deleteBtnID'  class='btn btn-danger deleteButton'
    // ?>

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

  


  <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                ...
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
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
  <script>
 
 $('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
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