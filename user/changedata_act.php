<?php
include 'config.php';
$user=$_POST['user'];
$name=$_POST['name'];
$email=$_POST['email'];

$cek=mysqli_query($con, "select * from user where uname='$user'");
if(mysqli_num_rows($cek)==1){
	mysqli_query($con, "update user set name='$name', email='$email' where uname='$user'");
	header("location:account.php?pesan=successchange");
}else{
	//header("location:ganti_pass.php?pesan=gagal");
}

 ?>
