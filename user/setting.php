<?php
include 'headset.php';
?>
<?php $cek = $_SESSION['uname']  ?>
<div class="row col-lg-12">
  <h2><tabs2>General Account Settings<tabs2></h2>
    <?php
    if(isset($_GET['pesan'])){
    	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
    	if($pesan=="successverif"){
        $result = $con->query("SELECT * FROM user where uname = '$cek'");
        while ($mem = mysqli_fetch_assoc($result)):
        $email = $mem['email'];
    		echo "<div class='alert alert-success'>the verification code has been sent to the email address ".$email."</div>";
        endwhile;
        $result->close();
    	}else if($pesan=='successchange'){
        echo "<div class='alert alert-success'>You have successfully changed the name and email</div>";
      }
    }
    ?>
		<div id="member">
				<table class="table table-striped table-bordered text-center">
						<thead>
              <tr>
  								<th>Username</th>
                  <th>
                  <?php
      						require('config.php');
      							$result = $con->query("SELECT * FROM user where uname = '$cek'");
      							while ($mem = mysqli_fetch_assoc($result)):
      							echo $mem['uname'];
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
      							$result = $con->query("SELECT * FROM user where uname = '$cek'");
      							while ($mem = mysqli_fetch_assoc($result)):
      							echo $mem['name'];
      						endwhile;
      						$result->close();
      						?>
                </th>
              </tr>
              <tr>
  								<th>Email</th>
                  <th>
                  <?php
      						require('config.php');
      							$result = $con->query("SELECT * FROM user where uname = '$cek'");
      							while ($mem = mysqli_fetch_assoc($result)):
      							echo $mem['email'];
      						endwhile;
      						$result->close();
      						?>
                </th>
              </tr>
              <tr>
  								<th>Date Created</th>
                  <th>
                  <?php
      						require('config.php');
      							$result = $con->query("SELECT * FROM user where uname = '$cek'");
      							while ($mem = mysqli_fetch_assoc($result)):
      							echo $mem['create_date'];
                    echo " ";
                    echo $mem['create_time'];
      						endwhile;
      						$result->close();
      						?>
                </th>
              </tr>
              <tr>
  								<th>Status</th>
                  <th>
                  <?php
      						require('config.php');
      							$result = $con->query("SELECT * FROM user where uname = '$cek'");
      							while ($mem = mysqli_fetch_assoc($result)):
                      if($mem['status'] == "Unverified"){
                        echo $mem['status'];
                      }else if($mem['status'] == "Verified"){
                        echo ''.$mem['status'].' <span class="icon-yes glyphicon glyphicon-ok-circle"></span>';
                      }
      						endwhile;
      						$result->close();
      						?>
                </th>
              </tr>
						</thead>
				</table>
        <?php
          require('config.php');
          $result = $con->query("SELECT * FROM user where uname = '$cek'");
          while ($mem = mysqli_fetch_assoc($result)):
          if($mem['status'] == "Unverified"){
        ?>
        <div class="form-inline">
          <a href="changedata.php"><button >Change Data</button></a>
          <a href="verify_act.php"><button >Verify Account</button></a>
        </div>
        <?php
      }else if($mem['status'] == "Verified"){
        ?>
        <div class="form-inline">
          <a href="changedata.php"><button >Change Data</button></a>
        </div>
        <?php
      }
        endwhile;
        $result->close();
        ?>
		</div>
	</div>
</div>

<?php
include 'footer.php';
?>
