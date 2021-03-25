<?php
    try{
        $server = '127.0.0.1:3306';
        $username= 'root';
        $password='';
        $database='blog_database';
        $con =new mysqli($server,$username,$password,$database) or die('Unable To connect');
    }
    catch(Exception $e){
    echo $e;     
    }

?>