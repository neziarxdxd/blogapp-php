<?php
    try{
        $server = 'https://remotemysql.com/';
        $username= '0eMCECZt9d';
        $password='FDWEJBIiNj';
        $database='0eMCECZt9d';
        $con =new mysqli($server,$username,$password,$database) or die('Unable To connect');
    }
    catch(Exception $e){
    echo $e;     
    }

?>