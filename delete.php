<?php
        if($_SESSION["name"]) {
            ?>
            <?php     
           
            
            $story_id = $_GET['id'];
            
            include 'connect.php';
            $user_name = $_SESSION['id'];
            
            
                $blog_story = $_POST["blog_story"];
                $blog_title = $_POST["blog_title"];
                $user_id = $_SESSION["id"];
        
                $blog_id = $_SESSION['blog_id'];
               
                $today_date = date("Y-m-d");
                
                $insert_data = mysqli_real_escape_string($con, $blog_story);
                // inserting data
                $sql = "UPDATE `blog_user` SET `date_update` = '$today_date',`blog_title` = '$blog_title', `blog_story` = '$insert_data' WHERE `blog_id` = $blog_id;";
                
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
