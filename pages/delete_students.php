<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator"){  
  

    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: index.php");
}

include("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();


if(isset($_GET['del'])){

    $id = $_GET['del'];
    $sql = ("DELETE FROM student_list WHERE id=$id");
    $con->query($sql) or die ($con->error); 
    
    echo header("Location: index.php");
}



