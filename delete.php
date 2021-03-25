<?php
error_reporting(0);
session_start();
        if($_SESSION["name"]) {
            ?>
            <?php     
           
            
            
            
            include 'connect.php';
            $user_name = $_SESSION['id'];
            
            
               
                $user_id = $_SESSION["id"];
        
                $blog_id = $_GET['delete_id'];

                
                
                $insert_data = mysqli_real_escape_string($con, $blog_story);
                // inserting data
                $sql = "DELETE FROM `blog_user` WHERE blog_id='$blog_id' and user_name='$user_id'";
                
                if ($con->query($sql) === TRUE) {                    
                    header("location:user_profile.php");
                    exit;                    
                } 
                else {
                    echo "Error: " . $sql . "<br>" . $con->error;
                }

                


          
    
            
            ?><?php
    ?><?php
    }
        else {
        header("Location:index.php");
        };
    ?>
