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

$title = $_POST['title'];
$year = $_POST['year'];
$batch = $_POST['batch'];

// FILE NAME WITH A RANDOM NUMBER
$pname = rand(1000, 10000)."-".$_FILES["file"]["name"];

// TEMPORARY FILE NAME TO STORE FILE
$tname = $_FILES["file"]["tmp_name"];

// FILE DIRECTORY
$upload_dir = '../uploads';

// TO MOVE FILE TO SPECIFIC LOCATION
move_uploaded_file($tname, $upload_dir.'/'.$pname);

$sql = "INSERT INTO `archive_list`(`title`, `year`, `batch`, `file_name`) VALUES ('$title', '$year', '$batch',
'$pname')";
$con2->query($sql) or die ($con2->error);

echo header("Location: archive.php");

}
?>

    <form action="" enctype="multipart/form-data" method="post">
    <h1 style="text-align:center;">ADD BOOKS</h1>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Thesis Title" id="inputDefault" name="title">
        </div>

        <div class="form-group">
                <select class="form-control" name="year">
                <option value="disabled Selected">Select Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
            </select>
        </div>

        <div class="form-group">
                <select class="form-control" name="batch">
                <option value="disabled Selected">Select Batch</option>
                <option value="Alpha">ALPHA</option>
                <option value="Beta">BETA</option>
                <option value="Charlie">CHARLIE</option>
                <option value="Delta">DELTA</option>
                <option value="Echo">ECHO</option>
                <option value="Falcon">FALCON</option>
                <option value="George">GEORGE</option>
            </select>
        </div>

        <div class="form-group">
        <input type="file" class="form-control-file" name="file">
        </div>

        <button type="submit" class="btn btn-primary btn-block" name="submit">SUBMIT</button>
    </form>


<?php include("../template/footer.php"); ?>