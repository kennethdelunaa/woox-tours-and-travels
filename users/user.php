<?php 
  require '../includes/header.php'; 
  require '../config/config.php'; 

  if(!isset($_SESSION['username'])){
    header("location: ".APPURL."");
  }
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $user_bookings = $conn->query("SELECT * FROM bookings WHERE user_id = '$id'");
    $user_bookings->execute();

    $allUserBookings = $user_bookings->fetchAll(PDO::FETCH_OBJ);
  }
  else{
    header('location: 404.php');
  }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table" style="margin-top: 150px; margin-bottom: 100px;">
                <thead>
                    <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Number of Guests</th>
                    <th scope="col">Check-in Date</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allUserBookings as $bookings) :?>
                    <tr>
                    <td><?php echo  $bookings->name; ?></td>
                    <td><?php echo  $bookings->phone_number; ?></td>
                    <td><?php echo  $bookings->num_of_guests; ?></td>
                    <td><?php echo  $bookings->checkin_date; ?></td>
                    <td><?php echo  $bookings->destination; ?></td>
                    <td><?php echo  $bookings->status; ?></td>
                    <td>$<?php echo  $bookings->payment; ?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
        </div>
    </div>

<?php 
  require '../includes/footer.php'; 
  ?>