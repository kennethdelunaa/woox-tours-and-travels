<?php 
require "../layouts/header.php";
require "../../config/config.php";

   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ". ADMINURL ."/admins/login-admins.php");
  }

    if(isset($_GET['id']) && isset($_GET['status'])){
        $id = $_GET['id'];
        $status = $_GET['status'];

        if($status == "Pending"){
            $update = $conn->prepare("UPDATE bookings SET status = 'Booked Successfully' WHERE id = '$id'");
            $update->execute();

            header("location: show-bookings.php");
        }
        else{
            $update = $conn->prepare("UPDATE bookings SET status = 'Pending' WHERE id = '$id'");
            $update->execute();

            header("location: show-bookings.php");
        }
        
    }

?>