<?php

if(!isset($_SESSION)){
  session_start();
}
  include_once("../connection/server.php");

  $con = connection();

  if(isset($_POST['login'])){
  
      $username = $_POST['username'];
      $password = $_POST['password'];
  
      $sql = "SELECT * FROM users_list WHERE username='$username' and password='$password'";
      $user = $con->query($sql) or die ($con->error);
      $users_row = $user->fetch_assoc();
      $total = $user->num_rows;
      
      if($total > 0){
          $_SESSION['UserLogin'] = $users_row['username'];
          $_SESSION['Access'] = $users_row['access'];
          $_SESSION['Users_id'] = $users_row['users_id'];
  
          echo header("Location: ../pages/archive.php");
      } else {
        echo header("Location: ../pages/index.php");
      }
  }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE THESIS ARCHIVE SYSTEM</title>

    <link rel="stylesheet" href="../css/style-light.min.css">
 </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="">CKCST Online Thesis Archiving</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
    
    <li class="nav-item">
        <a class="nav-link" href="<?php echo("../pages/index.php"); ?>">HOME</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo("../pages/about.php"); ?>">ABOUT CKCST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo ("../pages/contact.php"); ?>?">CONTACT US</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" placeholder="Username" type="text" name="username">
      <input class="form-control mr-sm-2" placeholder="Password" type="password" name="password">
      <button class="btn btn-success my-2 my-sm-0" type="submit" name="login">Login</button>
    </form>
    </ul>
  </div>
</nav>

<br>
<br>

<div class="container">

    
