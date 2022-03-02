<?php
error_reporting(0);
session_start();
include("../config/koneksi.php");
mysqli_query($conn, "UPDATE pengelola SET 
								 fullname  	= '$_POST[fullname]',
								 password	= '$_POST[password]'
								 WHERE kode_pengelola  = '$_POST[id_user]'");

echo"
<script>
alert('Fullname / Password Anda berhasil di perbarui.');window.location = '../p.php?p=edit-password';
</script>
";
?>