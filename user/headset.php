<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
	include 'cek.php';
	include 'config.php';
	?>
	<title>Hotel Transylvania</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../assets/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
	<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>

<link rel="stylesheet" href="../assets/css/mdb.min.css" />

<script type="text/javascript" src="../assets/js/mdb.min.js"></script>
<style>
tabs1{
	padding-left: 13em;
}
tabs2{
	padding-left: 10em;
}

.footer-bottom {
		background-color: #428BCA;
		min-height: 30px;
		width: 100%;
		margin-top: 50px;
}
.copyright {
		color: #fff;
		line-height: 30px;
		min-height: 30px;
		padding: 7px 0;
}
</style>
</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
					<a href="index.php"><img src="../logo/logo.png" height="50px" weight="50px" /></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="setting.php">Welcome <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- modal input -->
	<div id="modalpesan" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Message Notification</h4>
				</div>
				<div class="modal-body">
					<?php
					$periksa=mysqli_query($con, "select * from booking");
					while($q=mysqli_fetch_assoc($periksa)):
						$data = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(nama) from booking"));
						$message = $data['count(nama)'];
					endwhile;
					echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> You have ordered <a style='color:red'>". $message."</a> room</div>";
					?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-2">

		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			<li><a href="account.php"><span class="glyphicon glyphicon-user"></span> Account Information</a></li>
			<li><a href="ganti_pass.php"><span class="glyphicon glyphicon-lock"></span> Change Password</a></li>
			<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>  Logout</a></li>
		</ul>
	</div>
	<div class="col-md-10">
