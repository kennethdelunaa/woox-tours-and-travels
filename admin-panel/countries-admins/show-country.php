<?php 
  require "../layouts/header.php";
  require "../../config/config.php";
  
   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $countries = $conn->query("SELECT * FROM countries");
  $countries->execute();

  $allCountries = $countries->fetchAll(PDO::FETCH_OBJ);

?>

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Countries</h5>
                <a  href="<?php echo ADMINURL;?>/countries-admins/create-country.php" class="btn btn-primary mb-4 text-center float-right">Create Country</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Continent</th>
                    <th scope="col">Population</th>
                    <th scope="col">Territory</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allCountries as $country) :?>
                  <tr>
                    <th scope="row"><?php echo $country->id; ?></th>
                    <td><?php echo $country->name; ?></td>
                    <td><?php echo $country->continent; ?></td>
                    <td><?php echo $country->population; ?></td>
                    <td><?php echo $country->territory; ?></td>
                    <td><a href="delete-country.php?id=<?php echo $country->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php"; ?>