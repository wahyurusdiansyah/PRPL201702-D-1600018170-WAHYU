<?php
session_start();
include 'user/config.php';
$uname=$_POST['uname'];
$name=$_POST['name'];
$pass=$_POST['pass'];
$email =$_POST['email'];
$status = "Unverified";
date_default_timezone_set('Asia/Jakarta');
$create_date = date("Y/m/d");
$create_time = date("H:i:s");
$enkripsi = MD5($pass);

$sql = "INSERT INTO user(create_date, create_time, uname, name, pass, email, status)
		VALUES ('$create_date','$create_time','$uname', '$name','$enkripsi','$email','$status')";
mysqli_query($con, $sql);
if(mysqli_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:index.php");
}else{
	header("location:index.php?pesan=sukses")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>
