<?php
include 'header.php';
?>

<div class="container-fluid">
  <h4><tabs>RESERVATION FORM</tabs></h4>
  <form id="reservasi" method="post" role="form" action="reservation.php" class="form-horizontal text-center">
    <div class="form-group">
      <label for="nama" class="control-label col-md-3"><i class="fa fa-user prefix"></i>&nbsp;&nbsp;Your Name</label>
      <div class="col-md-5">
          <input type="text" name="nama" id="nama" aria-describedby="namahelp" class="form-control textbox" required><small id="namahelp" class="form-text text-muted">*Required</small><br>
      </div>
    </div>

    <div class="form-group">
         <label for="checkin" class="label-date col-xs-3 control-label"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Check-In</label>
        <div class="col-xs-5">
            <input type="date" class="form-control" name="checkin" aria-describedby="checkinhelp" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-calendar"></i>&nbsp;&nbsp;Check-Out</label>
        <div class="col-xs-5">
            <input type="date" class="form-control" name="checkout" aria-describedby="checkouthelp" required/>
        </div>
    </div>
    <div class="form-group">
        <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-bed"></i>&nbsp;&nbsp;Room Type</label>
        <div class="col-xs-5">
          <select id="room_type" name="room_type" class="form-control textbox" required>
              <option selected>Select Room Type</option>
              <option>Superior</option>
              <option>Deluxe</option>
              <option>Junior Suite</option>
              <option>Executive Suite</option>
              <option>Deluxe Loyal</option>
              <option>Junior Suite Royal</option>
              <option>Executive Suite Royal</option>
              <option>Diplomatic Suite</option>
              <option>Presidential Suite</option>
          </select>
        </div>
    </div>
		<div class="form-group">
        <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-bed"></i>&nbsp;&nbsp;Bed Type</label>
        <div class="col-xs-5">
          <select id="room_type" name="bed_type" class="form-control textbox" required>
              <option selected>Select Bed Type</option>
              <option>1 Single Bed</option>
              <option>2 Single Bed</option>
              <option>3 Single Bed</option>
              <option>1 Double Bed</option>
          </select>
        </div>
    </div>
    <div class="form-group">
      <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-user"></i>&nbsp;&nbsp;Adult</label>
        <div class="col-xs-5">
          <select id="guest" name="adult" class="form-control textbox" required>
              <option selected>Total Adult</option>
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
          </select>
        </div>
    </div>
		<div class="form-group">
        <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-child"></i>&nbsp;&nbsp;Children</label>
        <div class="col-xs-5">
          <select id="guest" name="children" class="form-control textbox" required>
              <option selected>Total Children</option>
              <option>0</option>
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <label for="checkout" class="label-date col-xs-3 control-label"><i class="fa fa-ban"></i>&nbsp;&nbsp;Preference</label>
        <div class="col-xs-5">
          <select id="room" name="preference" class="form-control textbox" required>
              <option selected>Select Preference</option>
              <option>Smooking</option>
              <option>No Smooking</option>
          </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-5 col-xs-offset-3">
            <!-- Initially, the submit button is disabled -->
            <button type="submit" class="btn btn-default" id="save" name="save">Booking<i class="fa fa-paper-plane-o ml-1"></i></button>
        </div>
    </div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		//semua element dengan class text-warning akan di sembunyikan saat load
		$('.text-warning').hide();
		//untuk mengecek bahwa semua textbox tidak boleh kosong
		$('input').each(function(){
			$(this).blur(function(){ //blur function itu dijalankan saat element kehilangan fokus
				if (! $(this).val()){ //this mengacu pada text box yang sedang fokus
					return get_error_text(this); //function get_error_text ada di bawah
				} else {
					$(this).removeClass('no-valid');
					$(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
					$(this).closest('div').removeClass('has-warning');
					$(this).closest('div').addClass('has-success');
					$(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
					$(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
				}
			});
		});
		//mengecek textbox Nama Valid Atau Tidak
		$('#nama').blur(function(){
      var nama = $('#nama').val();
			var len= nama.length;
			if(len>0){ //jika ada isinya
				if(!valid_nama(nama)){ //jika nama tidak valid
					$(this).parent().find('.text-warning').text("");
					$(this).parent().find('.text-warning').text("Your Name Invalid");
					return apply_feedback_error(this);
				} else {
					if (len>30){ //jika karakter >30
						$(this).parent().find('.text-warning').text("");
						$(this).parent().find('.text-warning').text("Max 30 Character");
						return apply_feedback_error(this);
					}
				}
			}
		});


		//submit form validasi
		$('#reservasi').submit(function(e){
			e.preventDefault();
			var valid=true;
			$(this).find('.textbox').each(function(){
				if (! $(this).val()){
					get_error_text(this);
					valid = false;
					$('html,body').animate({scrollTop: 0},"slow");
				}
				if ($(this).hasClass('no-valid')){
					valid = false;
					$('html,body').animate({scrollTop: 0},"slow");
				}
			});
			if (valid){
        swal({
          title: "Confirmation",
          text: "Press Yes for booking process.",
          type: "info",
          confirmButtonColor: "#1da1f2",
          confirmButtonText: "Yes",
          closeOnConfirm: false,
          allowOutsideClick: false,
          showLoaderOnConfirm: true
          }).then(function(){
            document.getElementById('reservasi').submit();
          });
	  		}
		});
	});

	//fungsi cek nama
	function valid_nama(nama) {
		var pola= new RegExp(/^[a-z A-Z]+$/);
		return pola.test(nama);
	}

	//menerapkan gaya validasi form bootstrap saat terjadi eror
	function apply_feedback_error(textbox){
		$(textbox).addClass('no-valid'); //menambah class no valid
		$(textbox).parent().find('.text-warning').show();
		$(textbox).closest('div').removeClass('has-success');
		$(textbox).closest('div').addClass('has-warning');
		$(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
		$(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
	}

	//untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
	function get_error_text(textbox){
		$(textbox).parent().find('.text-warning').text("");
		$(textbox).parent().find('.text-warning').text("Text Box Ini Tidak Boleh Kosong");
		return apply_feedback_error(textbox);
	}
</script>
</div>

<?php
include 'footer.php';

?>

<?php
include "config.php";
$id = abs(crc32(uniqid()));
$nama = (isset($_POST['nama']) ? $_POST['nama'] : '');
$checkin = (isset($_POST['checkin']) ? $_POST['checkin'] : '');
$checkout = (isset($_POST['checkout']) ? $_POST['checkout'] : '');
$room_type = (isset($_POST['room_type']) ? $_POST['room_type'] : '');
$bed_type = (isset($_POST['bed_type']) ? $_POST['bed_type'] : '');
$adult = (isset($_POST['adult']) ? $_POST['adult'] : '');
$children = (isset($_POST['children']) ? $_POST['children'] : '');
$preference = (isset($_POST['preference']) ? $_POST['preference'] : '');

if($nama != null && $checkin != null && $checkout != null && $room_type != null && $bed_type != null && $adult != null && $children != null && $preference != null){
  $sql = "INSERT INTO booking(id_payment, nama, checkin, checkout, room_type, bed_type, adult, children, preference)
  		VALUES ('$id','$nama','$checkin','$checkout','$room_type','$bed_type','$adult', '$children', '$preference')";
  mysqli_query($con, $sql);
  echo "<script>swal({
    title: 'Booking Status',
    text: 'Booking Request has been sent',
    type: 'success',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {
        setTimeout(function() {
          resolve()
        }, 2000)
      })
    }
  }).then(function() {
    swal('Booking Success!')
  })
      </script>";

}
$con->close();
?>
