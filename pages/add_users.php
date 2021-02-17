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
    
    
    if (isset($_POST['submit']) ){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access = $_POST['access'];
    $sql = "INSERT INTO `users_list`(`username`, `password`, `access`) VALUES ('$username', '$password', 
    '$access')";
    $con2->query($sql) or die ($con2->error);
    
    echo header("Location: users.php");
    }
?>

<form action="" method="post">
        <h1 style="text-align:center;">ADD USERS ACCOUNT</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Password" name="password">
        </div>

        <div class="form-group">
                <select class="form-control" name="access">
                <option value="disabled Selected">Select User Type</option>
                <option value="administrator">Administrator</option>
                <option value="students">Student</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
</form>

<?php include("../template/footer.php") ?>