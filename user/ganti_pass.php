<?php
include 'headset.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Password</h3>
<br/><br/>
<?php
if(isset($_GET['pesan'])){
	$pesan=mysqli_real_escape_string($con, $_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password anda telah diganti</div>";
	}
}
?>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="ganti_pass_act.php" method="post">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>">
		</div>
		<div class="form-group">
			<label>Old Password</label>
			<input name="lama" type="password" class="form-control" placeholder="Old Password ..">
		</div>
		<div class="form-group">
			<label>New Password</label>
			<input name="baru" type="password" class="form-control" placeholder="New Password ..">
		</div>
		<div class="form-group">
			<label>Repeat New Password</label>
			<input name="ulang" type="password" class="form-control" placeholder="Repeat New Password ..">
		</div>
		<div class="form-group">
			<label></label>
			<input type="submit" class="btn btn-info" value="Change">
			<input type="reset" class="btn btn-danger" value="reset">
		</div>
	</form>
</div>


<?php
include 'footer.php';

?>
