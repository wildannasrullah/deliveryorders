<?php  
error_reporting(0);
session_start();
include("../config/koneksi.php");
$user = mysqli_query($conn, "select *from pengelola p left join departemen d on p.id_dep=d.id_dep where p.username='$_SESSION[username]'");
$dep = mysqli_fetch_array($user);
$variable_p = 4;
$m = date(m);$d = date(d);$y = date(Y);
$dated = date('Y-m-d');	
$dd = "$m/$d/$y"; 
 //if(isset($_POST['Save'])){	
	//jika tombol tambah benar di klik maka lanjut proses membuat variable dari inputan
$t = mysqli_fetch_array(mysqli_query($conn, "select year(NOW())y, (DATE_FORMAT(CURDATE(),'%m'))m, (DATE_FORMAT(CURDATE(),'%d'))d, 
											 max(no_surat_jalan) as no , date(created_date) as date_sjm from tb_suratjalan 
											 where date(created_date)=date(NOW()) "));
$ye = $t['y']; $mo = $t['m']; $da = $t['d'];
										$noUrut = (int) substr($t[no], 14, 3);
										$noUrut++;
										$char = "SJM-$ye$mo$da-";
										$newID = $char . sprintf("%03s", $noUrut);
	$no_surat_jalan	= $newID;
	$no_gid	= $_POST['no_gid'];	
	$nama_customer		= $_POST['nama_customer'];	
	$alamat_customer		= $_POST['alamat_customer'];	
	$tanggal_kirim	= $_POST['tanggal_kirim'];
	$nopol_kendaraan	= $_POST['nopol_kendaraan'];
	$no_po	= $_POST['no_po'];
	$no_so	= $_POST['no_so'];
	$coa	= $_POST['coa'];
	$keterangan	= $_POST['keterangan'];	
	$sopir	= $_POST['sopir'];
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysqli_query($conn, "INSERT INTO tb_suratjalan VALUES('$no_surat_jalan','$no_gid', '$nama_customer', '$alamat_customer', '$tanggal_kirim', '$nopol_kendaraan','$no_po','$no_so','$coa','$keterangan','$_SESSION[username]',NOW(),'$_SESSION[username]',NOW(),'Open','0','','','$sopir')") or die(mysqli_error());
	
	// if($dep['id_dep']==$variable_p){
	// 	$input2 = mysqli_query($conn, "INSERT INTO tb_approve (no_surat_jalan, status, apr_by, apr_date, apr_change_date) VALUES('$no_surat_jalan','Approve','$_SESSION[username]',NOW(),NOW())") or die(mysqli_error());
	// }else{
	// 	$input2 = mysqli_query($conn, "INSERT INTO tb_approve (no_surat_jalan, status) VALUES('$no_surat_jalan','waiting for approval')") or die(mysqli_error());
	// }
	$input2 = mysqli_query($conn, "INSERT INTO tb_approve (no_surat_jalan, status) VALUES('$no_surat_jalan','waiting for approval')") or die(mysqli_error());
	echo "Data Surat Jalan Tersimpan. $no_surat_jalan";
 
//}
 
 ?> 