<?php
include 'header.php';
?>
<form>
<label for="filter">Filter : </label>
	<select class="form-control" id="filter" name="filter" onChange="this.form.submit()">
		 <option disabled selected>Select Filter</option>
		 <option>Date</option>
		 <option>Name</option>
	 </select>
</form>
<?php
   if(isset($_GET["filter"])){
       $filter=$_GET["filter"];
       if($filter == "Date"){
				 ?>
				   <br><form class="form-inline" method="POST" action="reservationdata.php">
				     <label class="mr-sm-2" for="from">From</label>
				     <input type="date" class="form-control" id="from" name="from">
				     <label class="mr-sm-2" for="to">To</label>
				     <input type="date" class="form-control" id="to" name="to">
				   <button type="submit" class="btn btn-primary">Filter</button>
				 </form>
				 <?php
			 }else if($filter == "Name"){
				 ?>
				 <br><form class="form-inline" method="POST" action="reservationdata.php">
				 	<label class="mr-sm-2" for="name">Search Name : </label><br>
				 	<input type="text" class="form-control" id="name" name="name" placeholder="Insert Name">
				 <button type="submit" class="btn btn-primary">Filter</button>
				 </form>
				 <?php
			 }
   }
?>
<h4><tabs>RESERVATION DATA</tabs></h4>
<font size="10px">
<div class="row">
		<div id="member" class="col-lg-12">
				<table class="table table-striped table-bordered text-center">
						<thead>
						<tr>
								<th class="text-center">ID Payment</th>
								<th class="text-center">Name</th>
								<th class="text-center">Check-In</th>
								<th class="text-center">Check-Out</th>
								<th class="text-center">Room Type</th>
								<th class="text-center">Bed Type</th>
								<th class="text-center">Total Adult</th>
								<th class="text-center">Total Children</th>
								<th class="text-center">Preference</th>
								<th class="text-center">Cost per day</th>
								<th class="text-center">Remaining Time</th>
						</tr>
						</thead>
						<tbody>
						<?php
						require('config.php');
						$from = (isset($_POST['from']) ? $_POST['from'] : '');
						$to = (isset($_POST['to']) ? $_POST['to'] : '');
						$name = (isset($_POST['name']) ? $_POST['name'] : '');
						if(!$from == null && !$to == null){
							$result = $con->query("SELECT * FROM booking where checkin between '".$from."' AND  '".$to."'");

							while ($mem = mysqli_fetch_assoc($result)):
								$room_type = $mem['room_type'];
								$checkin = $mem['checkin'];
								$rtdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT harga from priceroom where type_room = '$room_type'"));
								$trdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,checkin,checkout) from booking where checkin='$checkin'"));
								$timeremaining = $trdata['TIMESTAMPDIFF(DAY,checkin,checkout)'];
								$room_type_price = $rtdata['harga'];

							echo '<tr>';
							echo '<td>'.$mem['id_payment'].'</td>';
							echo '<td>'.$mem['nama'].'</td>';
							echo '<td>'.$mem['checkin'].'</td>';
							echo '<td>'.$mem['checkout'].'</td>';
							echo '<td>'.$mem['room_type'].'</td>';
							echo '<td>'.$mem['bed_type'].'</td>';
							echo '<td>'.$mem['adult'].'</td>';
							echo '<td>'.$mem['children'].'</td>';
							echo '<td>'.$mem['preference'].'</td>';
							echo '<td>IDR '.number_format($room_type_price, 0, ".", ".").'</td>';
							echo '<td>'.$timeremaining.' Day</td>';
							echo '</tr>';

						endwhile;

						$result->close();

					}else if(!$name == null){

						$result = $con->query("SELECT * FROM booking where nama like '%".$name."%'");

						while ($mem = mysqli_fetch_assoc($result)):
							$room_type = $mem['room_type'];
							$checkin = $mem['checkin'];
							$rtdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT harga from priceroom where type_room = '$room_type'"));
							$trdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,checkin,checkout) from booking where checkin='$checkin'"));
							$timeremaining = $trdata['TIMESTAMPDIFF(DAY,checkin,checkout)'];
							$room_type_price = $rtdata['harga'];

						echo '<tr>';
						echo '<td>'.$mem['id_payment'].'</td>';
						echo '<td>'.$mem['nama'].'</td>';
						echo '<td>'.$mem['checkin'].'</td>';
						echo '<td>'.$mem['checkout'].'</td>';
						echo '<td>'.$mem['room_type'].'</td>';
						echo '<td>'.$mem['bed_type'].'</td>';
						echo '<td>'.$mem['adult'].'</td>';
						echo '<td>'.$mem['children'].'</td>';
						echo '<td>'.$mem['preference'].'</td>';
						echo '<td>IDR '.number_format($room_type_price, 0, ".", ".").'</td>';
						echo '<td>'.$timeremaining.' Day</td>';
						echo '</tr>';

					endwhile;

					$result->close();


					}
					else{
						$result = $con->query("SELECT * FROM booking");

						while ($mem = mysqli_fetch_assoc($result)):
							$room_type = $mem['room_type'];
							$checkin = $mem['checkin'];
							$rtdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT harga from priceroom where type_room = '$room_type'"));
							$trdata = mysqli_fetch_assoc(mysqli_query($con,"SELECT TIMESTAMPDIFF(DAY,checkin,checkout) from booking where checkin='$checkin'"));
							$timeremaining = $trdata['TIMESTAMPDIFF(DAY,checkin,checkout)'];
							$room_type_price = $rtdata['harga'];

						echo '<tr>';
						echo '<td>'.$mem['id_payment'].'</td>';
						echo '<td>'.$mem['nama'].'</td>';
						echo '<td>'.$mem['checkin'].'</td>';
						echo '<td>'.$mem['checkout'].'</td>';
						echo '<td>'.$mem['room_type'].'</td>';
						echo '<td>'.$mem['bed_type'].'</td>';
						echo '<td>'.$mem['adult'].'</td>';
						echo '<td>'.$mem['children'].'</td>';
						echo '<td>'.$mem['preference'].'</td>';
						echo '<td>IDR '.number_format($room_type_price, 0, ".", ".").'</td>';
						echo '<td>'.$timeremaining.' Day</td>';
						echo '</tr>';

					endwhile;

					$result->close();

					}
						?>
						</tbody>
				</table>
		</div>
	</div>
</div>
</font>
<?php
include 'footer.php';
?>
