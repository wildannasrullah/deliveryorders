<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$p	=$_GET[p];  $act	=$_GET[act];

if($p=='user' AND $act=='add'){
	mysqli_query($conn, "INSERT INTO pengelola VALUE(NULL, '$_POST[fullname]','$_POST[username]','$_POST[password]','$_POST[level]','$_POST[email]','$_POST[dep]')");
	echo"
		<script>
			alert('Tambah User berhasil.');window.location = '../p.php?p=user';
		</script>";
}
if($p=='user' AND $act=='update'){
	mysqli_query($conn, "UPDATE pengelola SET 
								 fullname  	= '$_POST[fullname]',
								 username	= '$_POST[username]',
								 level		= '$_POST[level]',
								 email_user = '$_POST[email]',
								 id_dep		= '$_POST[dep]'
								 WHERE kode_pengelola  = '$_POST[id_user]'");

	echo"
		<script>
			alert('Edit User berhasil. $_POST[id_user]');window.location = '../p.php?p=user';
		</script>";
}
if($p=='user' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM pengelola WHERE kode_pengelola = '$_GET[id_user]'");
	echo"
		<script>
			alert('Delete User berhasil.');window.location = '../p.php?p=user';
		</script>";
}
?>