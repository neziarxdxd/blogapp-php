<?php

require_once 'modules/Parsedown.php';
require_once 'dompdf/autoload.inc.php';  
// Reference the Dompdf namespace 
use Dompdf\Dompdf; 
$Parsedown = new Parsedown();
$full_content = "";
$title_blog="";
$datePublish="";
$author="";

include 'connect.php';
$sql ="SELECT blog_user.*, login_user.full_name FROM `blog_user` inner join login_user on blog_user.user_name = login_user.user_name WHERE blog_id=?";
$story_id = $_GET['blogstory'];
$statement = $con->prepare($sql); 
$statement->bind_param("s",$story_id);            
$statement->execute();            
$result = $statement->get_result(); 

if(mysqli_num_rows($result) > 0)  {
    while($row = mysqli_fetch_array($result)){                                  //return true;  
        $full_content = $row['blog_story'];
        $title_blog = $row['blog_title'];
        $datePublish=$row['date_publish'];
        $author=$row['full_name'];        
    }       
}

else{
echo "error";
}

 
// Instantiate and use the dompdf class 
$dompdf = new Dompdf();
$htmlDesign ="
<div>
<div class='header' style='padding-bottom:20px;'>
<div class='title' style='text-align:center; font-size: 28pt; font-weight:900; padding-bottom:20px;'>$title_blog</div>
<div class='title' style='text-align:center; font-size: 12pt;'><b>Written by: </b>  <i>$author</i></div>
<div class='title' style='text-align:center; font-size: 12pt;'><b>Date Published: </b>  <i>$datePublish</i></div>
</div>

<div class='body' style='padding-left:50px; padding-right:50px'>
$full_content
</div>
</div>
";
$dompdf->loadHtml($htmlDesign); 
 
// (Optional) Setup the paper size and orientation 
$dompdf->setPaper('A4', 'portrait'); 
 
// Render the HTML as PDF 
$dompdf->render(); 
 
// Output the generated PDF to Browser 
$dompdf->stream($title_blog);
?>