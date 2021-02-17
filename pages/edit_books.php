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

$sql = "SELECT * FROM archive_list WHERE books_id = '$books_id'";
$books = $con->query($sql) or die ($con->error);
$books_row = $books->fetch_assoc();

if (isset($_POST['submit']) ){

    $title = $_POST['title'];
    $year = $_POST['year'];
    $batch = $_POST['batch'];
    $sql2 = "UPDATE `archive_list` SET title='$title', year='$year', batch='$batch'
    WHERE books_id = '$books_id'";
    $con2->query($sql2) or die ($con2->error);
    
    echo header("Location: archive.php");
    }
?>

    <form action="" method="post">
    <h1 style="text-align:center;">EDIT BOOKS</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Thesis Title" id="inputDefault" name="title"
            value="<?php echo $books_row['title']; ?>" >
        </div>

        <div class="form-group">
                <select class="form-control" name="year">
                <option value="<?php echo $books_row['year']; ?>"><?php echo $books_row['year']; ?></option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select>
        </div>

        <div class="form-group">
                <select class="form-control" name="batch">
                <option value="<?php echo $books_row['batch']; ?>"><?php echo $books_row['batch']; ?></option>
                <option value="Alpha">ALPHA</option>
                <option value="Beta">BETA</option>
                <option value="Charlie">CHARLIE</option>
                <option value="Delta">DELTA</option>
                <option value="Echo">ECHO</option>
                <option value="Falcon">FALCON</option>
                <option value="George">GEORGE</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>


<?php include("../template/footer.php"); ?>