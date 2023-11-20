<?php 
  require '../includes/header.php'; 
  require '../config/config.php'; 

  if(isset($_SESSION['username'])){
    header('location: '.APPURL . '');
  }

  //take the data from the inputs
  if(isset($_POST['submit'])){

    if(empty($_POST['email']) || empty($_POST['password'])){
      echo' <script>alert("one or more inputs are empty")</script>';
    }
    else{
      $email = $_POST['email'];
      $pass = $_POST['password'];

     //check for the email with a query first
     $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
     $login->execute();

     $fetch = $login->fetch(PDO::FETCH_ASSOC);

     if($login->rowCount() > 0){
      // echo' <script>alert("email verified")</script>';

       //check for the password with password verify
       if(password_verify($pass, $fetch['mypassword'])){
          // echo' <script>alert("password verified")</script>';
          
        $_SESSION['username'] = $fetch['username'];
        $_SESSION['user_id'] = $fetch['id'];

        header('location: '.APPURL.'');


       }else{
        echo' <script>alert("email or password not valid")</script>';
       }
    } 
    else{
        echo' <script>alert("email or password not valid")</script>';
       }
  }
}

 
?>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" method="POST" role="search" action="login.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Login</h4>
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
                      <button type="submit" name="submit" class="main-button">login</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php require '../includes/footer.php'; ?>