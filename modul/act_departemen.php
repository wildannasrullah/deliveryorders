<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
$p	=$_GET[p];  $act	=$_GET[act];

if($p=='departemen' AND $act=='add'){
	mysqli_query($conn, "INSERT INTO departemen VALUE(NULL, '$_POST[nama_dep]')");
	echo"
		<script>
			alert('Tambah Departemen berhasil.');window.location = '../p.php?p=departemen';
		</script>";
}
if($p=='departemen' AND $act=='update'){
	mysqli_query($conn, "UPDATE departemen SET 
								 nama_dep  	= '$_POST[nama_dep]'
								 WHERE id_dep  = '$_POST[id_dep]'");

	echo"
		<script>
			alert('Edit Departemen berhasil.');window.location = '../p.php?p=departemen';
		</script>";
}
if($p=='departemen' AND $act=='delete'){
	mysqli_query($conn, "DELETE FROM departemen WHERE id_dep = '$_GET[id]'");
	echo"
		<script>
			alert('Delete Departemen berhasil.');window.location = '../p.php?p=departemen';
		</script>";
}
?>