<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$p	=$_GET[p];  $act	=$_GET[act];

if($p=='approval' AND $act=='add'){
	mysqli_query($conn, "INSERT INTO manager VALUE(NULL, '$_POST[username]','$_POST[dep]')");
	echo"
		<script>
			alert('Tambah Manager berhasil.');window.location = '../p.php?p=approval';
		</script>";
}
if($p=='approval' AND $act=='update'){
	mysqli_query($conn, "UPDATE manager SET 
								 username	= '$_POST[username]',
								 id_dep		= '$_POST[dep]'
								 WHERE id_mgr  = '$_POST[id_mgr]'");

	echo"
		<script>
			alert('Edit Manager berhasil.');window.location = '../p.php?p=approval';
		</script>";
}
if($p=='approval' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM manager WHERE id_mgr = '$_GET[id]'");
	echo"
		<script>
			alert('Delete Manager berhasil.');window.location = '../p.php?p=approval';
		</script>";
}
?>