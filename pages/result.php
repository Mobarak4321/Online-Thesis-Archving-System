<?php

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    $_SESSION['UserLogin'];
}else {
}

include_once("../template/header_login.php");
include_once("../connection/server.php"); 

$con = connection();

$search = $_GET['search'];

$sql = "SELECT * FROM archive_list WHERE title LIKE '%$search%' ORDER BY title";
$archive = $con->query($sql) or die ($con->error);
$row = $archive->fetch_assoc();
?>

    <!-- SEARCH FORM -->

    <form class="form-inline my-2 my-lg-0" action="result.php" method="get">
      <input class="form-control mr-sm-1" type="text" placeholder="Search Thesis Title"
      id="search" name="search">
      <button class="btn btn-secondary my-2 my-sm-0" id="search" type="submit">Search</button>
      <button onclick="window.print();" class="btn btn-primary" id="print-btn">Print</button>
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
                    <td><a class="btn btn-primary btn-sm" href="index.php?books_id=<?php echo $row['books_id']; ?>">DOWNLOAD
                    </a><a class="btn btn-primary btn-sm" href="view.php?books_id=<?php echo $row['books_id']; ?>>">VIEW
                    </a><a class="btn btn-primary btn-sm" href="add_books.php?books_id=<?php echo $row['books_id']; ?>>">EDIT</a></td>
                </tr>
            <?php }while($row = $archive->fetch_assoc())  ?>
        </tbody>
    </table>

    <!-- END OF LIST -->

<?php include_once("../template/footer.php"); ?>