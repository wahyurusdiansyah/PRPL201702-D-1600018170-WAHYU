<!DOCTYPE html>
<html>
<head>
	<?php
	include 'config.php';
	?>
	<title>Hotel Transylvania</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

	<link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/sweetalert2.all.min.js"></script>
	<style src="assets/css/sweetalert2.min.css"></style>
	<style src="assets/css/sweetalert2.css"></style>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
	<link rel="stylesheet" href="assets/css/mdb.min.css">
	<!--css pricelist dan tab-->
	<style>
	tabs{
		padding-left: 22em;
	}
	tabs1{
		padding-left: 13em;
	}
	.membership-pricing-table {
	    width: 100%
	}

	.membership-pricing-table table .icon-no,.membership-pricing-table table .icon-yes {
	    font-size: 22px
	}

	.membership-pricing-table table .icon-no {
	    color: #a93717
	}

	.membership-pricing-table table .icon-yes {
	    color: #209e61
	}

	.membership-pricing-table table .plan-header {
	    text-align: center;
	    font-size: 48px;
	    border: 1px solid #e2e2e2;
	    padding: 25px 0
	}

	.membership-pricing-table table .plan-header-free {
	    background-color: #eee;
	    color: #555
	}

	.membership-pricing-table table .plan-header-blue {
	    color: #fff;
	    background-color: #61a1d1;
	    border-color: #3989c6
	}

	.membership-pricing-table table .plan-header-standard {
	    color: #fff;
	    background-color: #ff9317;
	    border-color: #e37900
	}

	.membership-pricing-table table td {
	    text-align: center;
	    width: 15%;
	    padding: 7px 10px;
	    background-color: #fafafa;
	    font-size: 14px;
	    -webkit-box-shadow: 0 1px 0 #fff inset;
	    box-shadow: 0 1px 0 #fff inset
	}

	.membership-pricing-table table,.membership-pricing-table table td {
	    border: 1px solid #ebebeb
	}

	.membership-pricing-table table tr td:first-child {
	    background-color: transparent;
	    text-align: right;
	    width: 24%
	}

	.membership-pricing-table table tr td:nth-child(5) {
	    background-color: #FFF
	}

	.membership-pricing-table table tr:first-child td,.membership-pricing-table table tr:nth-child(2) td {
	    -webkit-box-shadow: none;
	    box-shadow: none
	}

	.membership-pricing-table table tr:first-child th:first-child {
	    border-top-color: transparent;
	    border-left-color: transparent;
	    border-right-color: #e2e2e2
	}

	.membership-pricing-table table tr:first-child th .pricing-plan-name {
	    font-size: 12px
	}

	.membership-pricing-table table tr:first-child th .pricing-plan-price {
	    line-height: 35px
	}

	.membership-pricing-table table tr:first-child th .pricing-plan-price>sup {
	    font-size: 35%
	}

	.membership-pricing-table table tr:first-child th .pricing-plan-price>span {
	    font-size: 30%
	}

	.membership-pricing-table table tr:first-child th .pricing-plan-period {
	    margin-top: -7px;
	    font-size: 25%
	}

	.membership-pricing-table table .header-plan-inner {
	    position: relative
	}

	.membership-pricing-table table .recommended-plan-ribbon {
	    box-sizing: content-box;
	    background-color: #dc3b5d;
	    color: #FFF;
	    position: absolute;
	    padding: 3px 6px;
	    font-size: 11px!important;
	    font-weight: 500;
	    left: -6px;
	    top: -22px;
	    z-index: 99;
	    width: 100%;
	    -webkit-box-shadow: 0 -1px #c2284c inset;
	    box-shadow: 0 -1px #c2284c inset;
	    text-shadow: 0 -1px #c2284c
	}

	.membership-pricing-table table .recommended-plan-ribbon:before {
	    border: solid;
	    border-color: #c2284c transparent;
	    border-width: 6px 0 0 6px;
	    bottom: -5px;
	    content: "";
	    left: 0;
	    position: absolute;
	    z-index: 90
	}

	.membership-pricing-table table .recommended-plan-ribbon:after {
	    border: solid;
	    border-color: #c2284c transparent;
	    border-width: 6px 6px 0 0;
	    bottom: -5px;
	    content: "";
	    right: 0;
	    position: absolute;
	    z-index: 90
	}

	.membership-pricing-table table .plan-head {
	    box-sizing: content-box;
	    background-color: #ff9c00;
	    border: 1px solid #cf7300;
	    position: absolute;
	    top: -33px;
	    left: -1px;
	    height: 30px;
	    width: 100%;
	    border-bottom: none
	}
	</style>

</head>
<body>
	<div class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php"><img src="logo/logo.png" height="50px" weight="50px" /></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="" data-toggle="modal" data-target="#modalRegForm">Sign Up</a></li>
					<li><a href="login.php" data-toggle="modal" data-target="#modalLoginForm">Login</a></li>
				</ul>
			</div>
		</div>
	</div>

<!--Modal login awal-->

<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Login</h4>
            </div>
							<form action="login_act.php" method="post">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" placeholder="Insert your username" name="uname">
								</div>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
										<input type="password" class="form-control" placeholder="Insert your password" name="pass">
									</div>
									<div class="input-group">
										<button type="submit" class="btn btn-primary"><font size="2px">Login</font></button>
									</div>
							</form>
        </div>
    </div>
</div>
<!--Modal login akhir-->

<!--Modal registrasi awal-->
<div class="modal fade" id="modalRegForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
					</button>
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Sign Up</h4>
            </div>
							<form action="registrasi_act.php" method="post">
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" placeholder="Insert your username" name="uname">
								</div>
								<div class="input-group">
									<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
									<input type="text" class="form-control" placeholder="Insert your name" name="name">
								</div>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
										<input type="password" class="form-control" placeholder="Insert your password" name="pass">
									</div>
									<div class="input-group">
										<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
										<input type="text" class="form-control" placeholder="Insert your email" name="email">
									</div>
									<div class="input-group">
										<button type="submit" class="btn btn-primary"><font size="2px">Sign Up</font></button>
									</div>
							</form>
        </div>
    </div>
</div>
<!--Modal registrasi akhir-->

	<div class="col-md-2">
		<div class="row"></div>
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>  Dashboard</a></li>
			<li><a href="reservation.php"><span class="glyphicon glyphicon-send"></span>  Booking</a></li>
			<li><a href="pricelist.php"><span class="glyphicon glyphicon-usd"></span>  Price List</a></li>
		</ul>
	</div>
	<div class="col-md-10">
