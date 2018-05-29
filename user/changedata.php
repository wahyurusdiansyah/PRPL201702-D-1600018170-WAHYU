<?php
include 'headset.php';
?>

<h3><span class="glyphicon glyphicon-user"></span>  Edit account information</h3>
<br/><br/>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="changedata_act.php" method="post">
		<div class="form-group">
			<input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>">
		</div>
		<div class="form-group">
			<label>Name</label>
			<input name="name" type="text" class="form-control" placeholder="Insert your new name">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input name="email" type="email" class="form-control" placeholder="Insert your new email">
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
