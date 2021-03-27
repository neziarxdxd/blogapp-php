<?php

session_start();
        if($_SESSION["name"]) {
            ?>
            <?php                         
            
            
            include 'connect.php';
                
             
                $sql = "DELETE FROM `blog_user` WHERE blog_id=? and user_name=? ";

              
                $user_id = $_SESSION["id"];        
                $blog_id = $_GET['delete_id'];

                $statement = $con->prepare($sql); 
                $statement->bind_param("ss",$blog_id,$user_id);            
                        
                
                if ($statement->execute()){                    
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
