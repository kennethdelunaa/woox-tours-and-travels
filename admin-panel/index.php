
<?php 
  require "layouts/header.php";
  require "../config/config.php";

  //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
  if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  //COUNT THE NUMBER OF COUNTRIES
  $countries = $conn->query("SELECT COUNT(*) AS countries_count FROM countries");
  $countries->execute();
  $allCountries = $countries->fetch(PDO::FETCH_OBJ);

  //COUNT THE NUMBER OF CITIES
  $cities = $conn->query("SELECT COUNT(*) AS cities_count FROM cities");
  $cities->execute();
  $allCities = $cities->fetch(PDO::FETCH_OBJ);

  //COUNT THE NUMBER OF ADMINS
  $admins = $conn->query("SELECT COUNT(*) AS admins_count FROM admins");
  $admins->execute();
  $allAdmins = $admins->fetch(PDO::FETCH_OBJ);

  //COUNT THE NUMBER OF BOOKINGS
  $bookings = $conn->query("SELECT COUNT(*) AS bookings_count FROM bookings");
  $bookings->execute();
  $allBookings = $bookings->fetch(PDO::FETCH_OBJ);


?>          
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Countries</h5>
              <p class="card-text">number of countries: <?php echo $allCountries->countries_count; ?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cities</h5>
              
              <p class="card-text">number of cities: <?php echo $allCities->cities_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $allAdmins->admins_count; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              
              <p class="card-text">number of bookings: <?php echo $allBookings->bookings_count; ?></p>
              
            </div>
          </div>
        </div>
      </div>

<?php require "layouts/footer.php"; ?>