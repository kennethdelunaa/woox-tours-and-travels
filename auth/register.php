<?php require '../includes/header.php';
      require '../config/config.php'; 
      
      if(isset($_SESSION['username'])){
        header('location: '.APPURL . '');
      }

      if(isset($_POST['submit'])){

        if(empty($_POST['username'] || empty($_POST['email']) || empty($_POST['password']))){
          echo' <script>alert("some inputs are empty")</script>';
        }
        else{
          $username = $_POST['username'];
          $email = $_POST['email'];
          $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

          $insert = $conn->prepare("INSERT INTO users (username, email, mypassword) VALUES (:username, :email, :mypassword) ");
          $insert->execute([
            ':username'=> $username,
            ':email'=> $email,
            ':mypassword'=> $pass
          ]);
          header("location: login.php");
        }
      }
      
      ?>


  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="POST" role="search" action="#">
            <div class="row">
              <div class="col-lg-12">
                <h4>Register</h4>
              </div>
              <div class="col-md-12">
                <fieldset>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="username" placeholder="username" autocomplete="on" required>
                </fieldset>
              </div>

              <div class="col-md-12">
                  <fieldset>
                      <label for="email" class="form-label">Your Email</label>
                      <input type="text" name="email" class="email" placeholder="email" autocomplete="on" required>
                  </fieldset>
              </div>
           
              <div class="col-md-12">
                <fieldset>
                    <label for="password" class="form-label">Your Password</label>
                    <input type="password" name="password" class="password" placeholder="password" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button type="submit" class="main-button" name="submit">register</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require '../includes/footer.php'; ?>