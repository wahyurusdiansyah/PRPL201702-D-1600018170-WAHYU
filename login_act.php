<?php
session_start();
include 'user/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$decrypt = MD5($pass);
$query=mysqli_query($con, "select * from user where uname='$uname' and pass='$decrypt'")or die(mysqli_error());
if(mysqli_num_rows($query)==1){
	$_SESSION['uname']=$uname;
	header("location:user/index.php");
}else{
	//header("location:.php?pesan=gagal") or die(mysql_error());
}
?>
