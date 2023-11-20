<?php 
  require "../layouts/header.php";
  require "../../config/config.php";
  
   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  if(isset($_GET['id'])){

    $id = $_GET['id'];

    $image_delete = $conn->query("SELECT * FROM countries WHERE id = '$id'");
    $image_delete->execute();

    $getImage = $image_delete->fetch(PDO::FETCH_OBJ);

    //delete the image from the folder 
    //unlink function allows to delete a file inside a certain folder
    unlink("images-countries/" . $getImage->image);

    //deleting record
    $deleteRecord = $conn->query("DELETE FROM countries WHERE id = '$id'");
    $deleteRecord->execute();

    header("location: show-country.php");
  }
  

?>


<?php require "../layouts/footer.php"; ?>