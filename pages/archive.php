<?php

if(!isset($_SESSION)){
  session_start();  
}


if($_SESSION['Access'] == "administrator" || $_SESSION['Access'] == "students"){  
  
  $_SESSION['UserLogin'];
 
}else {
  echo header("Location: index.php");
}



include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();

$sql = "SELECT * FROM archive_list ORDER BY date_added";
$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();
?>

    <!-- SEARCH FORM -->

    <form class="form-inline my-2 my-lg-0" action="result.php" method="get">
      <input class="form-control mr-sm-1" type="text" placeholder="Search Thesis Title"
      id="search" name="search">
      <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
      <?php if($_SESSION['Access'] == "administrator"){ ?>
        <a href="<?php echo("add_books.php"); ?>" style ="margin-left: 15px;"class="btn btn-success my-2 my-sm-0">Add Thesis Info</a>
        <?php }?>
    </form>

    <!-- END SEARCH -->

    <br>
    
    <!-- LIST OF THESIS TITLE -->

    <table class = "table table-hover">
        <thead>
            <tr class="table-primary">
                <th>THESIS TITLE</th>
                <th>YEAR LEVEL</th>
                <th>BATCH</th>
                <th>DATE ADDED</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php do{  ?>
                <tr>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['year']; ?></td>
                    <td><?php echo $row['batch']; ?></td>
                    <td><?php echo date('M j, Y',strtotime($row['date_added'])); ?></td>
                    <td><a class="btn btn-primary btn-sm" href="downloads.php?file=<?php  echo $row['file_name']; ?>">DOWNLOAD </a><a class="btn btn-primary btn-sm" href="view.php?books_id=<?php echo $row['books_id']; ?>>">VIEW
                    <?php if($_SESSION['Access'] == "administrator"){ ?>
                    </a><a class="btn btn-primary btn-sm" href="edit_books.php?books_id=<?php echo $row['books_id']; ?>>">EDIT</a></td>
                    <?php }?>
                </tr>
            <?php }while($row = $archive->fetch_assoc())  ?>
        </tbody>
    </table>

    <!-- END OF LIST -->

    <!-- PAGINATION -->
  <ul class="pagination pagination-sm">
    <li class="page-item disabled">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</div>

    <!-- END OF PAGINATION -->

    

<?php include("../template/footer.php"); ?>
