<?php

if(!isset($_SESSION)){
    session_start();  
 }

 
 if($_SESSION['Access'] == "administrator" || $_SESSION['Access'] == "students"){  
  
    $_SESSION['UserLogin'];
   
}else {
    echo header("Location: index.php");
}
 
  include("../template/header_login.php");
  include_once("../connection/server.php");

  // INITIALIZE VARIABLE
  $con = connection();
  $con2 = connection();
  $books_id = $_GET['books_id'];

  // RETRIEVE BOOKS INFO
  $sql = "SELECT A1.books_id, A1.title, A1.year, A1.batch, A1.date_added
  FROM `archive_list` a1
  WHERE A1.books_id = '$books_id'";

  $archive = $con->query($sql) or die ($con->error);
  $row = $archive->fetch_assoc();

  // RETRIEVE STUDENTS INFO
  $sql_students = "SELECT * FROM `student_list` WHERE books_id = '$books_id'";
  $students = $con2->query($sql_students) or die ($con2->error);
  $student_rows = $students->fetch_all();

?>

<?php if($_SESSION['Access'] == "administrator") { ?>
<a class="btn btn-primary" href="add_students.php?books_id=<?php echo $row['books_id']; ?>"><b>Add Student</b></a>
<a class="btn btn-primary" href="edit_books.php?books_id=<?php echo $row['books_id']; ?>"><b>Edit Thesis</b></a>
<a class="btn btn-primary" name="delete" type="submit"><b>Delete Thesis</b></a>

<?php }?>
<br><br>

<input type="hidden" class="form-control" value ="<?php echo $row['$books_id']; ?>">
<ul class="list-group list-group-flush">
    <li class="list-group-item"><h5>THESIS TITLE : <?php echo $row['title']; ?></h5></li>
    <li class="list-group-item"><h5>YEAR LEVEL : <?php echo $row['year']; ?></h5></li>
    <li class="list-group-item"><h5>BATCH : <?php echo $row['batch']; ?></h5></li>
    <li class="list-group-item"><h5>DATE : <?php echo date('M j, Y',strtotime($row['date_added'])); ?></h5></li>
</ul>

<br>
<table class = "table table-hover">
        <thead>
            <tr class="table-primary">
                <th>STUDENT NAME</th>
                <th>EMAIL ADDRESS</th>
                <?php if($_SESSION['Access'] == "administrator"){ ?>
                <th></th>
                <?php }?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($student_rows as $key => $value) : ?>
            <td><?php echo $student_rows[$key][2]?></td>
            <td><?php echo $student_rows[$key][3]?></td>
        <?php if($_SESSION['Access'] == "administrator"){ ?>
            <td><a class="btn btn-primary btn-sm" name="delete" type="submit" href="delete_students.php?del=<?php echo $student_rows[$key][0]; ?>"><b>REMOVE</b></a></td>
            <?php }?>
            <tr>
        <?php endforeach ?>
        </tbody>
    </table>

<?php include("../template/footer.php"); ?>

