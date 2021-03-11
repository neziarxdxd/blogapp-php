<?php
    session_start();
    $message="";
    if(count($_POST)>0) {
        $con = mysqli_connect('127.0.0.1:3306','root','','blog_database') or die('Unable To connect');

        $user_first_name = $_POST["user_first_name"];
        $user_last_name = $_POST["user_last_name"];

        $email = $_POST["user_email"];

        $password = $_POST["password"];
        $user_name = $_POST["user_name"];
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql_query = "SELECT * FROM user_name='$user_name' or email='$email'";
        $sql = "INSERT INTO `login_user` (`user_name`, `first_name`, `last_name`, `email`, `password`,`full_name`) VALUES ('$user_name', '$user_first_name', '$user_last_name', '$email', '$hash','$user_first_name $user_last_name ');";
        if($con->query($sql_query) === TRUE){
            echo "There is existing email or username ";
        }
        else{
            if ($con->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $con->error;
                }
        }
        

        $con->close();
    }
    
    if(isset($_SESSION["id"])) {
        header("Location:login.php");
    }
?>
<html>
<head>
<title>User Login</title>

</head>
    <body>
    <form name="frmUser" method="post" action="" >
    <div class="message"><?php if($message!="") { echo $message; } ?></div>
    <h3 >Enter Login Details</h3>
    First Name:
    <br>
    <input type="text" name="user_first_name" onkeyup="preview()" id="user_first" required>
    <br>
    Last Name:
    <br>
    <input type="text" name="user_last_name" onkeyup="preview()" id="user_last" required>
    <br>
    Username:
    <input type="text" name = "user_name" id="userName" required>
    <br>
    Email:
    <br>
    <input type="text" name="user_email" required>
    <br>
    Password:<br>
    <input type="password" name="password" required>
    <br><br>
    <input type="submit" name="submit" value="Submit" required>
    <input type="reset">
    </form>
    <script src="modules/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>        
        function preview() {
            console.log("fdkfd");
            $("#userName").val(
              ( $("#user_first").val()+"." + $("#user_last").val()).toLowerCase().replace(/ /g,'')
            );
        }
    </script>
    </body>
    
</html>