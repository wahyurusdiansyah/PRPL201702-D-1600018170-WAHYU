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
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">

	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../assets/js/sweetalert2.all.min.js"></script>
	<style src="../assets/css/sweetalert2.min.css"></style>
	<style src="../assets/css/sweetalert2.css"></style>
	<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.src.js"></script>

	<link rel="stylesheet" href="../assets/css/mdb.min.css" />

	<script type="text/javascript" src="../assets/js/mdb.min.js"></script>

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
<!--Kumpulan Graph-->
	<script>
      var chart;
      $(document).ready(function() {
            chart = new Highcharts.Chart(
            {

               chart: {
                  renderTo: 'room_type_statistic',
                  plotBackgroundColor: null,
                  plotBorderWidth: null,
                  plotShadow: false
               },
               title: {
                  text: 'User Type Room Statistics'
               },
               tooltip: {
                  formatter: function() {
                      return '<b>'+
                      this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
                  }
               },


               plotOptions: {
                  pie: {
                      allowPointSelect: true,
                      cursor: 'pointer',
                      dataLabels: {
                          enabled: true,
                          color: '#000000',
                          connectorColor: 'green',
                          formatter: function()
                          {
                              return '<b>' + this.point.name + '</b>: ' + Highcharts.numberFormat(this.percentage, 2) +' % ';
                          }
                      }
                  }
               },

                  series: [{
                  type: 'pie',
                  name: 'Hotel Transylvania',
                  data: [
                  <?php
                      include "config.php";
                      $query = mysqli_query($con,"SELECT distinct room_type from booking"); // ini untuk nama data

                      while ($row = mysqli_fetch_array($query)) {
                          $room_type = $row['room_type'];
                          $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT count(room_type) from booking where room_type='$room_type'"));
                          $jumlah = $data['count(room_type)']; // jumlah data
                          ?>
                          [
                              '<?php echo $room_type ?>', <?php echo $jumlah; ?>
                          ],
                          <?php
                      }
                      ?>

                  ]
              }]
            });
      });
  </script>

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
					<li><a href="setting.php">Welcome <?php echo $_SESSION['uname']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></a></li>
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
			<li><a href="galery.php"><span class="glyphicon glyphicon-picture"></span>  Galery</a></li>
			<li><a href="reservation.php"><span class="glyphicon glyphicon-send"></span>  Booking</a></li>
			<li><a href="reservationdata.php"><span class="glyphicon glyphicon-folder-open"></span>  Reservation Data</a></li>
			<li><a href="graphreports.php"><span class="glyphicon glyphicon-stats"></span>  Graph Reports</a></li>
			<li><a href="payment.php"><span class="glyphicon glyphicon-credit-card"></span>  Print Payment</a></li>
			<li><a href="pricelist.php"><span class="glyphicon glyphicon-usd"></span>  Price List</a></li>
      <li><a href="faq.php"><span class="glyphicon glyphicon-question-sign"></span>  Faq</a></li>
		</ul>
	</div>
	<div class="col-md-10">
