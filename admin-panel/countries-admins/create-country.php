<?php 
  require "../layouts/header.php";
  require "../../config/config.php";


   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  if(isset($_POST['submit'])){

    if(empty($_POST['name'] || empty($_POST['continent']) || empty($_POST['population']) || empty($_POST['territory']) || empty($_POST['description']))){
      echo' <script>alert("some inputs are empty")</script>';
    }
    else{
      $name = $_POST['name'];
      $continent = $_POST['continent'];
      $population = $_POST['population'];
      $territory = $_POST['territory'];
      $description = $_POST['description'];
      $image = $_FILES['image']['name'];
      
      $dir = "images-countries/" . basename($image);

      $insert = $conn->prepare("INSERT INTO countries (name, image, continent, population, territory, description) VALUES (:name, :image, :continent, :population, :territory, :description) ");
      $insert->execute([
        ':name'=> $name,
        ':image'=> $image,
        ':continent'=> $continent,
        ':population'=> $population,
        ':territory'=> $territory,
        ':description'=> $description,
      ]);

      if(move_uploaded_file($_FILES['image']['tmp_name'],$dir)){
        header("location:".ADMINURL."/countries-admins/show-country.php");
      }


    }
  }


?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Countries</h5>
          <form method="POST" action="create-country.php" enctype="multipart/form-data">
                
            <!-- Country name input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
            <!-- Country image input -->
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
            <!-- Country continent input -->
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" />
                 
            <!-- Country population input -->
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
                 
            <!-- Country territory input -->
                </div>  <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
                 
            <!-- Country description input -->
                </div> 
                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <br>
      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

                
              </form>

            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"; ?>