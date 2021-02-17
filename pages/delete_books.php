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


if(isset($_POST['delete'])){

    $books_id = $_POST['books_id'];
    
    $sql = "DELETE FROM archive_list WHERE books_id = '$books_id' ";
    $con->query($sql) or die ($con->error); 
    
    echo header("Location: archive.php");

}

