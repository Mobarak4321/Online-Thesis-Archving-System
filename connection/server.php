<?php

function connection(){

    $host = "localhost";
    $username = "root";
    $password = "12345";
    $database = "test";
    
    
     $con = new mysqli($host, $username, $password, $database);
    
     if($con->connect_error){
         echo $con->connect_error;
     }else{
         return $con;
     }

    }

    function viewer_books_list(){
        $results = mysqli_query($db,"SELECT * FROM archive_list");
    }
     
?>