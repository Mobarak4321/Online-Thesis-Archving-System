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
    $con2 = connection();
    $books_id = $_GET['books_id'];

    if(isset($_POST['submit'])){
        $student_name = $_POST['student_name'];
        $student_email = $_POST['student_email'];

        $sql = "INSERT INTO `student_list` (`books_id`, `student_name`, `student_email`) VALUES ($books_id, '$student_name', '$student_email')";
        $con->query($sql) or die ($con->error);
    }


    $sql = "SELECT * FROM archive_list ORDER BY books_id ASC";
                
    $result_set = $con2->query($sql);
    $title = $result_set->fetch_all();

?>


<form action="" method="post">
        <h1 style="text-align:center;">ADD STUDENTS</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Student Name" name="student_name">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Email Address" name="student_email">
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
</form>


<?php include("../template/footer.php"); ?>