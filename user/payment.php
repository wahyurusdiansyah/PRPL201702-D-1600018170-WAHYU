<?php
include 'header.php';
?>
<?php

?>
<form action="payment.php" method="POST">
  <div class="form-group">
    <div class="col-md-3">
      <label for="nama" class="control-label"><i class="fa fa-search prefix"></i>Search Data : </label>
        <input type="text" name="cari" id="cari" placeholder="Insert your ID Payment" aria-describedby="namahelp" class="form-control textbox" required><small id="namahelp" class="form-text text-muted">*Press Enter</small><br>
    </div>
  </div>
</form>
<?php
  $cari = (isset($_POST['cari']) ? $_POST['cari'] : '');
?>
<?php
require('config.php');
  $result =mysqli_query($con, "SELECT id_payment FROM booking where id_payment = '$cari'");
  $tes = null;
  while ($mem = mysqli_fetch_assoc($result)){
    $tes = $mem['id_payment'];
  }
  if($cari != null && $cari == $tes){
?>

<div class="row col-lg-12">
  <h2><tabs1>Payment Info<tabs1></h2>
		<div id="member">
				<table class="table table-striped table-bordered text-center">
						<thead>
              <tr>
  								<th>ID Payment</th>
                  <th>
                  <?php
      						require('config.php');
      							$result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
      							while ($mem = mysqli_fetch_assoc($result)):
      							echo $mem['id_payment'];
      						endwhile;
      						$result->close();
      						?>
                </th>
              </tr>
						<tr>
								<th>Name</th>
                <th>
                <?php
    						require('config.php');
    							$result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
    							while ($mem = mysqli_fetch_assoc($result)):
    							echo $mem['nama'];
    						endwhile;
    						$result->close();
    						?>
              </th>
            </tr>
            <tr>
              <th>Room Type</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                  echo $mem['room_type'];
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Bed Type</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                  echo $mem['bed_type'];
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Total Adult</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                  echo $mem['adult'];
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Total Children</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                  echo $mem['children'];
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Preference</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                  echo $mem['preference'];
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Length of Stay</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):

                    $room_type = $mem['room_type'];
    								$checkin = $mem['checkin'];
    								$trdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,checkin,checkout) from booking where checkin='$checkin'"));
    								$timeremaining = $trdata['TIMESTAMPDIFF(DAY,checkin,checkout)'];

                  echo ''.($timeremaining).' Day';
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Cost per day</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):

                    $room_type = $mem['room_type'];
    								$rtdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT harga from priceroom where type_room = '$room_type'"));
    								$room_type_price = $rtdata['harga'];

                  echo 'IDR '.number_format($room_type_price, 0, ".", ".").'';
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Discount</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                    $ddata = mysqli_fetch_assoc(mysqli_query($con,"SELECT diskon from priceroom where type_room = '$room_type'"));
                    $diskon = $ddata['diskon'];

                  echo ''.($diskon).' %';
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Additional fee</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):
                    $adfdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT additionalfee from priceroom where type_room = '$room_type'"));
                    $additionalfee = $adfdata['additionalfee'];

                  echo 'IDR '.number_format($additionalfee, 0, ".", ".").'';
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>
            <tr>
              <th>Total Cost</th>
              <th>
                <?php
                require('config.php');
                  $result = $con->query("SELECT * FROM booking where id_payment = '$cari'");
                  while ($mem = mysqli_fetch_assoc($result)):

                    $room_type = $mem['room_type'];
    								$checkin = $mem['checkin'];

    								$rtdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT harga from priceroom where type_room = '$room_type'"));
    								$trdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,checkin,checkout) from booking where checkin='$checkin'"));
                    $ddata = mysqli_fetch_assoc(mysqli_query($con, "SELECT discount from priceroom where type_room = '$room_type'"));
                    $adfdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT additionalfee from priceroom where type_room = '$room_type'"));
                    $additionalfee = $adfdata['additionalfee'];
                    $discount = $ddata['discount'];
                    $timeremaining = $trdata['TIMESTAMPDIFF(DAY,checkin,checkout)'];
    								$room_type_price = ($rtdata['harga']*$timeremaining)+$additionalfee;
                    $diskon = $room_type_price * $discount;
                    $hasildiskon = $room_type_price - $diskon;

                  echo 'IDR '.number_format($hasildiskon, 0, ".", ".").'';
                endwhile;
                $result->close();
                ?>
              </th>
            </tr>

						</thead>
				</table>
        <button type="submit" onclick="window.print()">Print</button>
		</div>
	</div>
</div>
<?php } ?>
<?php
include 'footer.php';
?>
