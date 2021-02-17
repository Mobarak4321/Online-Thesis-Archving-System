<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE THESIS ARCHIVE SYSTEM</title>

    <link rel="stylesheet" href="../css/style-light.min.css">
 </head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">CKCST ONLINE THESIS ARCHIVE SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo("archive.php");?>">Thesis List</a>
      </li>
      <li class="nav-item">
      <?php if($_SESSION['Access'] == "administrator"){ ?>
        <a class="nav-link" href="<?php echo("users.php"); ?>">Users List</a>
      </li>
      <?php }?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a class="nav-link" href="<?php echo("logout.php");?>" >Logout</a></li>
    </ul>
  </div>
</nav>

<br>
<br>

<div class="container">

    
