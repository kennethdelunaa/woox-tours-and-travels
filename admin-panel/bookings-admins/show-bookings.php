<?php 
  require "../layouts/header.php";
  require "../../config/config.php";

   //CHECK IF LOGGED IN IF NOT, REDIRECT IN LOGIN PAGE
   if(!isset($_SESSION['admin_name'])){
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $bookings = $conn->query("SELECT * FROM bookings");
  $bookings->execute();

  $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);
?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
            
              <table class="table mt-4">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Number of Guests</th>
                    <th scope="col">Checkin Date</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Payment</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allBookings as $booking) : ?>
                  <tr>
                    <th scope="row"><?php echo $booking->id; ?></th>
                    <td><?php echo $booking->name; ?></td>
                    <td><?php echo $booking->phone_number; ?></td>
                    <td><?php echo $booking->num_of_guests; ?></td>
                    <td><?php echo $booking->checkin_date; ?></td>
                    <td><?php echo $booking->destination; ?></td>
                    <td>$<?php echo $booking->payment; ?></td>
                    <?php if($booking->status == "Pending") : ?>
                     <td><a href="status-update.php?id=<?php echo $booking->id; ?>&status=<?php echo $booking->status; ?>" class="btn btn-danger  text-center ">Pending</a></td>
                     <?php else: ?>
                      <td><a href="status-update.php?id=<?php echo $booking->id; ?>&status=<?php echo $booking->status; ?>" class="btn btn-success  text-center ">Booked Successfully</a></td>
                  </tr>
                  <?php endif; ?>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php"; ?>