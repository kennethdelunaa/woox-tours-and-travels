<?php 
  require "../layouts/header.php";
  require "../../config/config.php";

   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  if(isset($_POST['submit'])){

    if(empty($_POST['admin_name'] || empty($_POST['email']) || empty($_POST['mypassword']))){
      echo' <script>alert("some inputs are empty")</script>';
    }
    else{
      $admin_name = $_POST['admin_name'];
      $email = $_POST['email'];
      $pass = password_hash($_POST['mypassword'], PASSWORD_DEFAULT);

      $insert = $conn->prepare("INSERT INTO admins (admin_name, email, mypassword) VALUES (:admin_name, :email, :mypassword) ");
      $insert->execute([
        ':admin_name'=> $admin_name,
        ':email'=> $email,
        ':mypassword'=> $pass
      ]);
      header("location: admins.php");
    }
  }
  

?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php">

                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                </div>
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <input type="text" name="admin_name" id="form2Example1" class="form-control" placeholder="name" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="mypassword" id="form2Example1" class="form-control" placeholder="password" />
                </div>

                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

              </form>

            </div>
          </div>
        </div>
      </div>
      
<?php require "../layouts/footer.php"; ?>