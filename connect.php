<?php
    try{
        $server = 'localhost';
        $username= 'root';
        $password = '';
        $database ='blog_database';
        $con = new mysqli($server,$username,$password,$database) or die('Unable To connect');
    } // let's study good practices huhuhu
    catch(Exception $e){
    echo $e;     
    }

?>