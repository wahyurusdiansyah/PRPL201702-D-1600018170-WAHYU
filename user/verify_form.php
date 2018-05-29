<?php
include 'headset.php';
?>
<form action="verify_form.php" method="POST">
  <div class="form-group">
    <div class="col-md-3">
      <label for="nama" class="control-label"><i class="fa fa-search prefix"></i>Insert Verification Code : </label>
        <input type="text" name="verify" id="verify" placeholder="Insert Your Verification Code" aria-describedby="namahelp" class="form-control textbox" required><small id="namahelp" class="form-text text-muted">*Press Enter</small><br>
    </div>
  </div>
</form>
<?php
  $verify = (isset($_POST['verify']) ? $_POST['verify'] : '');
?>
<?php
require('config.php');
  $result =mysqli_query($con, "SELECT * FROM verify where verify_code = '$verify'");
  $tes = null;
  while ($mem = mysqli_fetch_assoc($result)){
    $tes = $mem['verify_code'];
  }
  if($verify == $tes){
    $user = $_SESSION['uname'];
    $verif = "Verified";
    mysqli_query($con, "update user set status='$verif' where uname='$user'");
    mysqli_query($con, "TRUNCATE TABLE  verify");
  }
//  header("location:verify_form.php?pesan=successverified");
?>

<?php
include 'footer.php';

?>
