<?php
error_reporting(0);
session_start();
include('config/koneksi.php');

//jika session username belum dibuat, atau session username kosong
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
	//redirect ke halaman login
}
$get = $_GET[g];
$username = $_POST['username'];
$password = $_POST['password'];

// query untuk mendapatkan record dari username
$query = "SELECT * FROM pengelola WHERE username = '$username'";
$hasil = mysqli_query($conn, $query);
$data = mysqli_fetch_array($hasil);
$pass = password_hash("$data[password]", PASSWORD_DEFAULT);
// cek kesesuaian password
if (password_verify($password, $pass))
{
    // menyimpan username dan level ke dalam session
    $_SESSION['username'] = $data['username'];
    $_SESSION['level'] = $data['level'];
if (isset($_SESSION['level']))
{
  
  if ($_SESSION['level'] == "admin")
   { 
	session_start();
	$_SESSION['username']    = $username;
    $_SESSION['password']    = $password;
	$username = $_SESSION['username'];
	
	header('location:p.php?p=dashboard');
   }
   else if($_SESSION['level'] == "keluar"){
	   echo "<script>alert('User sudah keluar.'); window.location = 'index.php'</script>";
   }
   else {	
	   header('location:p.php?p=dashboard');
	}	
	
}
elseif (!isset($_SESSION['level']))
{
  if($get=='b'){
	  echo "<script>alert('Anda tidak punya akses ke sistem ini.'); window.self.close();</script>";
  }else{
	echo "<script>alert('Username atau Password yang Anda masukan, SALAH.'); window.location = 'index.php'</script>";
  }
}
}
else {
	if($get=='b'){
		echo "<script>alert('Anda tidak punya akses ke sistem ini.'); window.self.close();</script>";
	}else{
		echo "<script>alert('Username atau Password yang Anda masukan, SALAH.'); window.location = 'index.php'</script>";
	}
}
?>