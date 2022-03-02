<?php  
error_reporting(0);
session_start();
include("../config/koneksi.php");
 
 //if(isset($_POST['Save'])){	
	//jika tombol tambah benar di klik maka lanjut proses membuat variable dari inputan
	$no_surat_jalan		= $_POST['no_surat_jalan'];	
	$no_gid				= $_POST['no_gid'];
	$nama_customer		= $_POST['nama_customer'];	
	$alamat_customer	= $_POST['alamat_customer'];	
	$tanggal_kirim		= $_POST['tanggal_kirim'];
	$nopol_kendaraan	= $_POST['nopol_kendaraan'];
	$no_po	= $_POST['no_po'];
	$no_so	= $_POST['no_so'];
	$coa	= $_POST['coa'];
	$keterangan	= $_POST['keterangan'];	
	$sopir	= $_POST['sopir'];
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	mysqli_query($conn, "UPDATE tb_suratjalan SET no_gid = '$no_gid', nama_customer = '$nama_customer', alamat_customer = '$alamat_customer', 
						tanggal_kirim = '$tanggal_kirim', nopol_kendaraan = '$nopol_kendaraan', no_po = '$no_po', no_so = '$no_so', coa = '$coa', keterangan = '$keterangan', updated_by = '$_SESSION[username]', 
						updated_date = NOW(),sopir = '$sopir'
						WHERE no_surat_jalan  = '$no_surat_jalan'");
	echo 'Data Surat Jalan Terupdate '.$no_surat_jalan;
 
//}
 
 ?> 