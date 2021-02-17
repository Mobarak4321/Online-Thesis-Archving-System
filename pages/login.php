<?php 

if(!isset($_SESSION)){
    session_start();
}

include("../template/header.php");
include_once("../connection/server.php"); 

$con = connection();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users_list WHERE username='$username' and password='$password'";
    $user = $con->query($sql) or die ($con->error);
    $row = $user->fetch_assoc();
    $total = $user->num_rows;
    
    if($total > 0){
        $_SESSION['UserLogin'] = $row['username'];
        $_SESSION['Access'] = $row['access'];

        echo header("Location: archive.php");
    } else {
        echo "NO USER FOUND";
    }
}

?>


<form action="" method="post">

        <h1 style="text-align:center;">LOGIN</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Username" name="username" id="username">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Enter Password" name="password" id="password">
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="login">LOGIN</button>
    </form>

<?php include("../template/footer.php"); ?>